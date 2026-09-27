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

## 2.2 Style IPB's `_prettyXprint` code blocks like `[code]` blocks

### What `_prettyXprint` is

IPB 3.x did not store code blocks with the class `prettyprint`. It stored them
as:

```html
<pre class="_prettyXprint _lang-php _linenums:0">...</pre>
```

Each class is disabled with a leading `_` (and `prettyprint` becomes
`_prettyXprint`) so that the editor would not highlight the code. IPB switched
the classes back only when it displayed the post. The archive shows the stored
markup as-is and never switches them back.

### Why it matters

The topic page styles code with `pre.prettyprint` (in `app/Views/topic.php`).
`[code]` tags already become `<pre class="prettyprint prettyprinted">` in
`_transformPostText()`, but `_prettyXprint` blocks match no rule, so they lose
the grey code box.

### In the dump

- 3,226 `<pre class="_prettyXprint ...">` blocks in 1,868 posts.
- Most are plain `_prettyXprint` (2,167). The rest carry extra classes:
  - languages: `_lang-`, `_lang-js`, `_lang-sql`, `_lang-html`, `_lang-css`,
    `_lang-nocode`, `_lang-auto`
  - line numbers: `_linenums:0`, `_linenums:1` … `_linenums:16680`, and a few
    broken ones like `_linenums:NaN` and `_linenums:0_linenums:0`
- All use double quotes, and `_prettyXprint` is always the first class.
- 6 more are escaped text, `&lt;pre class="_prettyXprint"&gt;`, where a user
  quoted the HTML in a post. They must stay as they are.
- Not in scope: 15 plain `<pre>` and 1 `<pre class="">`.

### How

In `PostModel::_transformPostText()`:

1. Skip posts where `strpos($text, '_prettyXprint')` is `false`, so most
   posts cost no regex.
2. Replace the literal `<pre class="_prettyXprint` with
   `<pre class="prettyprint prettyprinted _prettyXprint`. Match the real `<`,
   so the escaped `&lt;pre` text is left alone. Keep the other classes; they
   do no harm.
3. Check a topic with a `_prettyXprint` block in the page source and clear the
   page cache.
