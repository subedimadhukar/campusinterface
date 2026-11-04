# CampusInterface

A full-site-editing block theme for schools, academies and online courses, and the first of WPInterface's
"Interface" theme family. Pairs with the free [Public LMS](https://github.com/wpinterface/public-lms) plugin.

Status: **phase 2** (0.3.0, in progress): 49 patterns (38 in the inserter), 17 templates including overrides for all seven
Public LMS templates, 10 template parts, five colour and three type variations, section styles and five Query Loop card
styles. Accessibility-ready, right-to-left and multilingual checked, Lighthouse CI budgets, a Playground blueprint.
Tested with Public LMS and its seeded demo data (see [docs/CONTRACTS.md](docs/CONTRACTS.md) for the contract version
and the integration status).

- What the theme takes from the plugin: [docs/CONTRACTS.md](docs/CONTRACTS.md)
- Lint: `composer install && composer check` (PHPCS plus the palette contrast check)
- Right-to-left CSS: every stylesheet in `assets/css/` has a `-rtl.css` copy made by rtlcss 4.3.0 (pinned in the private `package.json`). After changing a stylesheet run `npm ci` once, then `npm run rtl`, and commit both files; CI regenerates them and fails on a stale copy. Write logical properties; use `/*rtl:ignore*/` only where a physical value must not flip, with a comment saying why. `package.json`, the lockfile and `node_modules` stay out of the theme zip
- Review checklist with every command and result: [docs/REVIEW-CHECKLIST.md](docs/REVIEW-CHECKLIST.md)
- Lighthouse budgets: `.github/workflows/lighthouse.yml` starts wp-env with the theme and Public LMS, runs `bin/lighthouse-seed.sh` (demo courses and an "Academy home" page) and `npx @lhci/cli@0.15.1 autorun` against `lighthouserc.json`: performance ≥ 90 and accessibility ≥ 95 on the academy home, course archive, a course and a lesson, plus Core Web Vitals, page-weight and no-third-party budgets. Public LMS is a separate private repository: add a `PUBLIC_LMS_TOKEN` secret (read access to `wpinterface/public-lms`) to run it; without access the job is skipped, not failed. Set the `PUBLIC_LMS_REF` variable to test another branch
- Lighthouse by hand (Node 24, wp-env running, academy home pattern on a page): `npx lighthouse@12 http://localhost:8888/academy-home/ --only-categories=performance,accessibility,best-practices,seo` and again with `--preset=desktop`
- Multilingual check: `.wp-env.json` adds Polylang (dev only; the theme does not need it). If you use `.wp-env.override.json`, its `plugins` list replaces this one, so list Polylang there too. How the RTL and multilingual passes were run: [docs/REVIEW-CHECKLIST.md](docs/REVIEW-CHECKLIST.md), section 8
- Other projects' wp-env sites already on 8888? Put `{ "port": 8930, "testsPort": 8931 }` in `.wp-env.override.json` (git-ignored) and keep it when adding the `themes` line below
- Theme Check (as CI runs it, on the `git archive` copy without dev files):
  `mkdir -p dist/campusinterface && git archive HEAD | tar -x -C dist/campusinterface && echo '{ "themes": [ "./dist/campusinterface" ] }' > .wp-env.override.json && npx --yes @wordpress/env@12 start && npx --yes @wordpress/env@12 run cli wp theme-check run campusinterface`

## Try it in WordPress Playground

`blueprint.json` builds a demo site: Public LMS and CampusInterface installed and active, ten demo courses
from `wp publiclms seed`, an "Academy home" front page built from the theme's full-page pattern, a Courses and
My learning menu, and the visitor logged in as admin. It declares `WP_ENVIRONMENT_TYPE` `local`, because the
seed command refuses production sites.

Both repositories are private for now, so the blueprint points at the URLs they will have once public:

| Step | Source now | Swap to when |
|---|---|---|
| `installTheme` | `git:directory` of `https://github.com/wpinterface/campusinterface`, branch `main` (no build step, so the repository works as is) | The theme is on WordPress.org: `"themeData": { "resource": "wordpress.org/themes", "slug": "campusinterface" }` |
| `installPlugin` | `url` `https://github.com/wpinterface/public-lms/releases/latest/download/public-lms.zip`. The plugin's `build/` and `vendor/` are not in git, so it needs the built zip; its release workflow must attach `public-lms.zip` to each GitHub release | The plugin is on WordPress.org: `"pluginData": { "resource": "wordpress.org/plugins", "slug": "public-lms" }`, or another URL to the built zip |

Then open `https://playground.wordpress.net/?blueprint-url=https://raw.githubusercontent.com/wpinterface/campusinterface/main/blueprint.json`.
Check that link once the repositories are public: if Playground cannot fetch the release zip from GitHub in
the browser, use the WordPress.org resource or a host that serves the zip with CORS headers.

To test the blueprint before then, `bin/playground-local.sh` swaps both install steps for zips of the local
working copies (this theme's `HEAD`, and a release-like copy of `../../plugins/public-lms` with production
Composer packages; the plugin must be built) and serves the result with `@wp-playground/cli` 3.1.60 on
http://127.0.0.1:9400. Tested 2026-11-04 on WordPress 7.1.4 and PHP 8.3: every step runs, and the academy
home, course archive, a course, a lesson and the dashboard render with the plugin's blocks.

Requires WordPress 6.7+ and PHP 7.4+. GPL-2.0-or-later. © WPInterface, https://wpinterface.com
