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
| `database/` | `legacy_forums_light.sql.zip` — a MySQL dump of the five `fm_` tables, for local testing (see below) |

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

## Running it locally in a Claude Code cloud session

The cloud container starts with PHP 8.4, Composer and Docker installed, but no
database and no `.env`. Nothing below is automated — run the steps by hand at
the start of a session that needs to load pages. Everything is lost when the
container is reclaimed, so repeat them in each new session.

The dump in `database/` came from MySQL 9.3, so run that exact version in
Docker rather than installing Ubuntu's MySQL 8.0 or MariaDB.

1. Start Docker and MySQL 9.3, then wait until it accepts connections (about
   30 seconds on first start, while the image downloads and initialises):

   ```bash
   (dockerd > /tmp/dockerd.log 2>&1 &); sleep 5
   docker start mysql93 2>/dev/null || docker run -d --name mysql93 -p 3306:3306 \
     -e MYSQL_ROOT_PASSWORD=root -e MYSQL_DATABASE=legacy_forums \
     -e MYSQL_USER=dev -e MYSQL_PASSWORD=dev mysql:9.3
   until docker exec mysql93 mysql -uroot -proot -e "SELECT 1" >/dev/null 2>&1; do sleep 3; done
   ```

2. Import the dump. Stream the `.sql` straight out of the zip — the zip also
   holds a `__MACOSX/` entry, so name the file explicitly:

   ```bash
   unzip -p database/legacy_forums_light.sql.zip legacy_forums_light.sql \
     | docker exec -i mysql93 mysql -uroot -proot legacy_forums
   ```

   Takes about 5 seconds. Expect 8 forums, 4,658 topics, 16,989 posts, 5,823
   profiles and 1,148 attachments. To re-import, drop and recreate the
   database first and re-grant it to `dev`:

   ```bash
   docker exec mysql93 mysql -uroot -proot -e "DROP DATABASE legacy_forums; \
     CREATE DATABASE legacy_forums; GRANT ALL ON legacy_forums.* TO 'dev'@'%';"
   ```

3. Install PHP dependencies and write `.env`:

   ```bash
   composer install
   cp .env.sample .env
   sed -i "s/^database.default.hostname = localhost/database.default.hostname = 127.0.0.1/; \
     s/^database.default.username = username/database.default.username = dev/; \
     s/^database.default.password = password/database.default.password = dev/; \
     s#^app.baseURL = ''#app.baseURL = 'http://localhost:8080/'#" .env
   ```

   Use `127.0.0.1`, not `localhost`: with `localhost` PHP tries a Unix socket,
   and MySQL is only reachable over TCP from the Docker container.
   `.env.sample` already sets `WEBPAGE_CACHE=0`, so the page cache stays off.

4. Serve the site. Several workers let concurrent requests through:

   ```bash
   (PHP_CLI_SERVER_WORKERS=8 php -S localhost:8080 -t public > /tmp/php.log 2>&1 &)
   curl -s -o /dev/null -w "%{http_code}\n" localhost:8080/   # 200
   ```

   Errors go to `writable/logs/log-YYYY-MM-DD.log`; look for `CRITICAL`.

To check every page at once, request each topic and forum URL from the
database and count the status codes:

```bash
docker exec mysql93 mysql -uroot -proot -N legacy_forums -e "
  SELECT CONCAT('/topic/', tid, '-', IF(title_seo = '', 'x', title_seo)) FROM fm_topics;
  SELECT CONCAT('/forum/', id, '-', name_seo) FROM fm_forums" 2>/dev/null > /tmp/urls.txt
xargs -P 8 -I{} curl -s -o /dev/null -w "%{http_code} {}\n" "localhost:8080{}" \
  < /tmp/urls.txt > /tmp/results.txt
cut -d' ' -f1 /tmp/results.txt | sort | uniq -c
```

That takes about 30 seconds for 4,666 URLs. With the current code and dump,
expect 4,643 × 200, 3 × 404 and 20 × 400:

- 404 `/forum/3-support` — the forum has no topics.
- 404 `/topic/136992-...` — the topic has no posts.
- 404 `/topic/2582-...` — started by a guest (member id 0), who has no
  `fm_profile_portal` row, so the inner join drops the topic.
- 400 — topics whose `title_seo` holds percent-encoded non-ASCII text (Russian,
  Arabic, Persian, `ç`, `…`). CodeIgniter's `permittedURIChars` rejects them
  before routing. Known and not yet fixed.

Any other non-200 is a regression.

Limits of the local copy:

- `public/uploads/` is git-ignored and empty, so attachment images and
  `/attachment/{id}` downloads 404 locally. The attachment HTML is still
  generated from the database, so you can check it in the page source.
- The container cannot reach `forums.grocerycrud.com`, so live pages can't be
  compared from inside the session.
- Don't use `pkill -f "php -S ..."` to restart the server — the pattern also
  matches the shell running the command and kills it.

## Before and after screenshots

For every change that shows on a page, show the owner before and after
screenshots in the chat:

- **Full page**, never cropped to the changed part.
- The same URL on both, picked so the change is clearly visible.
- Save them in the session's scratchpad directory and send them with the
  `SendUserFile` tool. **Never commit screenshots** or save them inside the repo.

Serve the old code next to the new one from a git worktree in the scratchpad,
on port 8081, while the working copy stays on 8080 (`$S` is the scratchpad
directory):

```bash
git worktree add $S/before origin/master   # or the commit before the change
ln -s "$PWD/vendor" $S/before/vendor && cp .env $S/before/.env
(cd $S/before && PHP_CLI_SERVER_WORKERS=4 php -S localhost:8081 -t public > /tmp/php-before.log 2>&1 &)
```

Take the screenshots with the pre-installed Playwright and Chromium:

```js
// node shot.js /topic/1318-x $S
const { chromium } = require('/opt/node22/lib/node_modules/playwright');
(async () => {
  const [url, dir] = process.argv.slice(2);
  const browser = await chromium.launch({ executablePath: '/opt/pw-browsers/chromium' });
  const page = await browser.newPage({ viewport: { width: 1280, height: 900 } });
  for (const [port, name] of [[8081, 'before'], [8080, 'after']]) {
    await page.goto(`http://localhost:${port}${url}`, { waitUntil: 'networkidle' });
    await page.screenshot({ path: `${dir}/${name}.png`, fullPage: true });
  }
  await browser.close();
})();
```

Remove the worktree when done: `git worktree remove --force $S/before`.

## Ground rules

- No write operations. The archive is read-only.
- Don't change URL formats — they exist for SEO continuity.
- Don't rename database tables or columns.
- Clear the page cache after touching a view or model, or you'll be looking at
  a stale page and chasing a bug that isn't there.
