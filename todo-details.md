# To-do details

Details for the open tasks in `todo-list.md`. Remove a task's section once it
is done.

## 1.2 Replace the placeholder tests with real ones

`composer test` only runs CodeIgniter's example tests. Cover every route
answering GET and HEAD, the 301 redirects, `PostModel::_transformPostText()`
(`[code]`, `[url]`, attachments, documentation links) and attachment downloads
getting the right filename.

## 1.3 Add a `yarn crawl` script

Turn the full-site crawl from `CLAUDE.md` into a script that fails on any
unexpected status code.

## 1.4 Add a GitHub Action

Run the tests and the crawl against the dump on every PR. The repo has no CI
today.

## 1.5 Stop losing guest posts

The inner joins on `fm_profile_portal` drop anything by a member without a
profile row, so topic 2582 returns 404. Use a `LEFT JOIN` and show the default
avatar.

## 1.7 Replace the default CodeIgniter `README.md`

Write a short one that points to `CLAUDE.md`.

## 1.8 *(on hold)* Fix the 20 topic pages with non-ASCII slugs

Topics with Russian, Arabic, Persian, `ç` or `…` in their slug return 400.
CodeIgniter's `permittedURIChars` rejects them, and the slug check in
`Website.php` would 404 them. URLs must stay the same.

## 1.15 Keep `index.php` out of the old redirects

`Redirects::redirect_to_home_page()` uses `redirect()->to('/')`, which goes
through `site_url()`. With `$indexPage = 'index.php'` in `app/Config/App.php`,
`/tags/…`, `/user/…`, `/best-content` and `/some/edit/link/…` 301 to
`/index.php/`, unless the live `.env` sets `app.indexPage`. Check the live
`Location` header first. The fix is `redirect()->to(base_url(), 301)`, as
`Website::_redirectTo()` does.

## 1.16 Show times on a 12-hour clock

The models format dates with `'d F Y - H:i A'`, so a 24-hour hour gets an
AM/PM suffix: `17:15 PM`. Use `h:i A`. It affects every date on the site.

## 2.3 Answer HEAD requests with a lighter query

A HEAD request runs the full controller and renders the whole view, and PHP
then throws the body away. Answer HEAD from a cheap query instead, for example
only checking that the topic or forum id exists, and return the same status
code GET would give.

It must still query the real database: that is why HEAD exists here (owner
decision 3.1). Keep the 404s and 301s identical to GET's, and keep HEAD and GET
on separate page cache entries.
