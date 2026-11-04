# CampusInterface

A full-site-editing block theme for schools, academies and online courses, and the first of WPInterface's
"Interface" theme family. Pairs with the free [Public LMS](https://github.com/wpinterface/public-lms) plugin.

Status: **phase 1** (0.2.0): 49 patterns (38 in the inserter), 16 templates including overrides for all six Public LMS
templates, 10 template parts, five colour and three type variations, section styles and five Query Loop card
styles. Accessibility-ready. Tested with Public LMS dd43e36 (contract 1.2.0) and its seeded demo data: archive, course, lesson
with Mark complete, and dashboard (see [docs/CONTRACTS.md](docs/CONTRACTS.md), "Phase 1 integration status").

- What the theme takes from the plugin: [docs/CONTRACTS.md](docs/CONTRACTS.md)
- Lint: `composer install && composer check` (PHPCS plus the palette contrast check)
- Review checklist with every command and result: [docs/REVIEW-CHECKLIST.md](docs/REVIEW-CHECKLIST.md)
- Lighthouse (Node 24, wp-env running, academy home pattern on a page): `npx lighthouse@12 http://localhost:8888/academy-home/ --only-categories=performance,accessibility,best-practices,seo` and again with `--preset=desktop`
- Multilingual check: `.wp-env.json` adds Polylang (dev only; the theme does not need it). If you use `.wp-env.override.json`, its `plugins` list replaces this one, so list Polylang there too. How the RTL and multilingual passes were run: [docs/REVIEW-CHECKLIST.md](docs/REVIEW-CHECKLIST.md), section 8
- Other projects' wp-env sites already on 8888? Put `{ "port": 8930, "testsPort": 8931 }` in `.wp-env.override.json` (git-ignored) and keep it when adding the `themes` line below
- Theme Check (as CI runs it, on the `git archive` copy without dev files):
  `mkdir -p dist/campusinterface && git archive HEAD | tar -x -C dist/campusinterface && echo '{ "themes": [ "./dist/campusinterface" ] }' > .wp-env.override.json && npx --yes @wordpress/env@12 start && npx --yes @wordpress/env@12 run cli wp theme-check run campusinterface`

Requires WordPress 6.7+ and PHP 7.4+. GPL-2.0-or-later. © WPInterface, https://wpinterface.com
