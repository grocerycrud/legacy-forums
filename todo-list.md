# To-do list

## 1. Claude suggested to-do list

- [x] **1.1** Document how to set up the site locally in a Claude Code cloud
  session (in `CLAUDE.md`).
- [ ] **1.2** Replace the placeholder tests with real ones. `composer test`
  only runs CodeIgniter's example tests. Cover every route answering GET and
  HEAD, the 301 redirects, `PostModel::_transformPostText()` (`[code]`, `[url]`,
  attachments) and attachment downloads getting the right filename.
- [ ] **1.3** Turn the full-site crawl from `CLAUDE.md` into a script
  (`yarn crawl`) that fails on any unexpected status code.
- [ ] **1.4** Add a GitHub Action that runs the tests and the crawl against the
  dump on every PR. The repo has no CI today.
- [ ] **1.5** Stop losing guest posts. The inner joins on `fm_profile_portal`
  drop anything by a member without a profile row, so topic 2582 returns 404.
  Use a `LEFT JOIN` and show the default avatar.
- [x] **1.6** Replace the 6 hardcoded `http://www.grocerycrud.com/forums/...`
  fallback avatars in `home-page.php` with the local default image.
- [ ] **1.7** Replace the default CodeIgniter `README.md` with a short one that
  points to `CLAUDE.md`.
- [ ] **1.8** *(on hold)* Fix the 20 topic pages with non-ASCII slugs (Russian,
  Arabic, Persian, `ç`, `…`) that return 400. CodeIgniter's `permittedURIChars`
  rejects them, and the slug check in `Website.php` would 404 them. URLs must
  stay the same.

## 2. Owner suggestions

- [ ] **2.1** Point old documentation links in posts to the v1.x documentation.
  Replace `http://www.grocerycrud.com/documentation/*` with
  `https://www.grocerycrud.com/v1.x/documentation/*`, keeping the rest of the
  path. Every form of the old link is rewritten to the same URL, whether it
  starts with `http://`, `https://`, `http://www.` or `https://www.`:

  | Old link in the post | Becomes |
  | --- | --- |
  | `http://www.grocerycrud.com/documentation/options_functions/set_relation_n_n` | `https://www.grocerycrud.com/v1.x/documentation/options_functions/set_relation_n_n` |
  | `https://www.grocerycrud.com/documentation/options_functions/set_relation_n_n` | `https://www.grocerycrud.com/v1.x/documentation/options_functions/set_relation_n_n` |
  | `http://grocerycrud.com/documentation/options_functions/set_relation_n_n` | `https://www.grocerycrud.com/v1.x/documentation/options_functions/set_relation_n_n` |
  | `https://grocerycrud.com/documentation/options_functions/set_relation_n_n` | `https://www.grocerycrud.com/v1.x/documentation/options_functions/set_relation_n_n` |

  The dump has
  1,039 such links: 959 `http://www.`, 78 `https://www.` and 2 `http://`
  without `www`. The rewrite belongs in `PostModel::_transformPostText()`, since
  the archive never writes to the database.
