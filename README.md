# grocery CRUD legacy forums

A read-only archive of the old grocery CRUD support forum, live at
<https://forums.grocerycrud.com>.

The forum ran on Invision Power Board 3.x at `www.grocerycrud.com/forums/` and
is now closed. This CodeIgniter 4 app serves the old topics at their old URLs,
straight from the original IPB database tables, so the pages keep their search
ranking. There is no login, posting or search, and nothing writes to the
database.

**Everything else is in [`CLAUDE.md`](CLAUDE.md):** layout, routes, how post
bodies and attachments are handled, the page cache, and how to run the site
locally against the dump in `database/`. Open work is in
[`todo-list.md`](todo-list.md).

## Quick start

Needs PHP 8.x, Composer and a MySQL database loaded from
`database/legacy_forums_light.sql.zip`.

```bash
composer install
cp .env.sample .env   # then set app.baseURL and database.default.*
php -S localhost:8080 -t public
```

Point a real web server at `public/`, never at the project root.

## Commands

```bash
yarn sitemap-generate   # regenerate public/sitemap.txt
yarn remove-cache       # clear the page cache after changing a view or model
composer test           # phpunit
```
