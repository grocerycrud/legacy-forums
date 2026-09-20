# CLAUDE.md

## What this is

A read-only archive of the old grocery CRUD support forum.

The original forum ran on Invision Power Board (IPB) 3.x at
`www.grocerycrud.com/forums/`. It is now closed — there is no login, no posting,
no replying, no search. This CodeIgniter 4 app re-serves the old content at the
old URLs so the pages keep their search ranking. It reads the original IPB
database tables directly and never writes to them.

- Live: `https://forums.grocerycrud.com`
- Local: `http://local.forums.grocerycrud.com/`

## Stack

- PHP 8.x, CodeIgniter 4.7 (via Composer)
- MySQL, database `legacy_forums`, all tables prefixed `fm_`
- No front-end build. Yarn exists only to run two shell scripts.

## Layout

| Path | What's in it |
| --- | --- |
| `app/Controllers/` | `Website` (all public pages), `Attachment`, `Redirects`, `Sitemap` |
| `app/Models/` | `ForumModel`, `TopicModel`, `PostModel`, `AttachmentModel` |
| `app/Views/` | `home-page.php`, `forum.php`, `topic.php` — each is a full standalone page with the original IPB markup and a large block of inlined CSS |
| `public/` | Web root; point the server here |
| `public/uploads/` | Original IPB attachment files, in `monthly_MM_YYYY/` folders |
| `public/public/` | Original IPB theme assets: emoticons, images, JS |
| `writable/cache/webpages/` | HTML page cache |
| `scripts/` | Shell helpers |

## Routes

All in `app/Config/Routes.php`. Auto-routing is off.

- `/` — home page, forum list
- `/forum/{id}-{name_seo}` and `/forum/{id}-{name_seo}/page-{n}` — topics, 30/page
- `/topic/{id}-{title_seo}` and `/topic/{id}-{title_seo}/page-{n}` — posts, 20/page
- `/attachment/{id}` — download for non-image attachments
- Dead IPB URLs (`/tags/...`, `/user/...`, `/best-content`) 301 to the home page

All of the above answer both GET and HEAD.

Slugs must match `^[0-9]+-[0-9a-z-]+$`. Only the leading number is used to look
up the record; the text part is ignored. A slug that doesn't match gives a 404.

### Every route must answer HEAD as well as GET

CodeIgniter treats `HEAD` as a verb in its own right, so a route declared with
`$routes->get(...)` returns **404 to a HEAD request**. UptimeRobot monitors the
site with HEAD, so a GET-only route makes the monitor report the site as down.

Routes are therefore declared with `$routes->match($verbs, ...)`, where
`$verbs = ['GET', 'HEAD']`. Use that for any new public route. Pass the verbs
uppercase — lowercase is deprecated in CodeIgniter 4.7.

The page cache keys on the HTTP method, so HEAD and GET keep separate cache
entries and a HEAD request cannot poison the cached GET response.

Note that a HEAD request still runs the full controller and renders the view;
PHP just discards the body. That is fine at UptimeRobot's polling rate,
especially with the page cache on.

## Database

Original IPB table and column names, unchanged:

- `fm_forums` — PK `id`, slug `name_seo`
- `fm_topics` — PK `tid`, slug `title_seo`, parent `forum_id`
- `fm_posts` — PK `pid`, parent `topic_id`, body `post`
- `fm_profile_portal` — avatars, joined on `pp_member_id`
- `fm_attachments` — PK `attach_id` (see below)

All dates are integer UNIX timestamps.

## Post bodies are IPB legacy markup

The `post` column is *not* clean HTML. It's a mix of HTML, HTML entities and
leftover BBCode. `PostModel::_transformPostText()` converts it, and any new
markup rule belongs there. It currently handles:

- absolute `grocerycrud.com/forums/` links → local links
- the `<#EMO_DIR#>` token → `default` (emoticon image paths)
- `[code]...[/code]` → `<pre>`
- `[url="..."]...[/url]` → bold text
- `[attachment=ID:FILENAME]` → an `<img>` or a download link

Because the body already contains HTML, views print it raw (`echo $post->post`)
rather than through `esc()`. Anything `_transformPostText()` injects must
therefore be escaped at the point it's built.

## Attachments

Posts reference attachments with a tag like:

    [attachment=705:db.PNG]

The number is `fm_attachments.attach_id`. **The filename after the colon is just
a label — it is not the name of the file on disk.** Always resolve the path from
the database row:

- `attach_location` — path of the real file, relative to `public/uploads/`
- `attach_is_image` — 1 for an image, 0 otherwise
- `attach_img_width` / `attach_img_height` — pixel size (sometimes 0)
- `attach_file` — original filename
- `attach_thumb_location` — thumbnail path (currently unused; we serve full size
  and scale with CSS)

Example: attachment 705 has location
`monthly_11_2013/post-2223-0-48007300-1383455864.png`, so the public URL is
`/uploads/monthly_11_2013/post-2223-0-48007300-1383455864.png`.

**Non-image attachments were renamed to `.ipb` by IPB** to stop the server
executing them — 139 of them are `.php` files. Never link to a `.ipb` path
directly. Link to `/attachment/{id}`, which `Attachment::download()` serves with
the real filename from `attach_file` and a `Content-Disposition: attachment`
header.

`PostModel::getPosts()` scans all 20 posts on the page for tags first, then
calls `AttachmentModel::getByIds()` once for the whole page. Keep it that way —
don't add a query per tag.

Attachment rows referenced by 13 tags no longer exist in the table. Those fall
back to printing the label text, so raw BBCode never leaks into the page.

## Page cache

`Website::_pageCache()` caches each page for 30 days, but only when
`WEBPAGE_CACHE=1` in `.env`.

**This will hide your changes.** Either set `WEBPAGE_CACHE=0` while developing,
or clear the cache after every change to a view or model:

```bash
yarn remove-cache
```

## Environment

Copy `.env.sample` to `.env`. Relevant keys:

- `WEBPAGE_CACHE` — `1` on, `0` off
- `SHOW_ADS` — `1` shows the ad blocks in the views
- `CI_ENVIRONMENT` — `development` or `production`
- `app.baseURL`, `database.default.*`

## Commands

```bash
yarn sitemap-generate   # regenerate public/sitemap.txt
yarn remove-cache       # clear the page cache
composer test           # phpunit
```

## Ground rules

- No write operations. The archive is read-only.
- Don't change URL formats — they exist for SEO continuity.
- Don't rename database tables or columns.
- Clear the page cache after touching a view or model, or you'll be looking at
  a stale page and chasing a bug that isn't there.
