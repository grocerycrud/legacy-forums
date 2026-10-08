# To-do list

Details for open tasks are in `todo-details.md`.

## 1. Claude suggested to-do list

- [x] **1.1** Document local setup in a Claude Code cloud session.
- [ ] **1.2** Replace the placeholder tests with real ones.
- [ ] **1.3** Add a `yarn crawl` script for the full-site crawl.
- [ ] **1.4** Add a GitHub Action that runs the tests and the crawl.
- [ ] **1.5** Stop losing guest posts (topic 2582 returns 404).
- [x] **1.6** Use the local default image for the home page fallback avatars.
- [x] **1.7** Replace the default CodeIgniter `README.md`.
- [ ] **1.8** *(on hold)* Fix the 20 topic pages with non-ASCII slugs.
- [x] **1.9** Fill the `"Array"` meta tags (description, `og:*`) with real values.
- [x] **1.10** Build canonical URLs from the stored slug, not the requested one.
- [x] **1.11** 301 a bad page part (`/page-01`, `/page-0`, `/garbage`) to the clean URL.
- [x] **1.12** Point `robots.txt` at the sitemap.
- [x] **1.13** Escape topic titles and forum names.
- [x] **1.14** Give each topic link in the forum lists its own tooltip.
- [ ] **1.15** Keep `index.php` out of the old redirects (`/tags/…`, `/user/…`).
- [ ] **1.16** Show times on a 12-hour clock (`17:15 PM` today).

## 2. Owner suggestions

- [x] **2.1** Point old documentation links in posts to the v1.x documentation.
- [x] **2.2** Style IPB's `_prettyXprint` code blocks like `[code]` blocks.
- [ ] **2.3** Answer HEAD requests with a lighter query, such as only checking that the topic or forum exists.

## 3. Owner decisions

Settled. Don't suggest changing these again.

- **3.1** Leave the caching and response headers of HEAD requests and 404
  pages as they are. They exist so that the uptime monitor's requests always
  check that the site can still read the real database.
