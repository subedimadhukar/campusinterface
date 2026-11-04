# CampusInterface

A full-site-editing block theme for schools, academies and online courses, and the first of WPInterface's
"Interface" theme family. Pairs with the free [Public LMS](https://github.com/wpinterface/public-lms) plugin.

Status: **phase 0 scaffold** (0.1.0): theme.json v3 design system, bundled fonts, eight templates, header and
footer parts, eight patterns, two colour and two type variations.

- What the theme takes from the plugin: [docs/CONTRACTS.md](docs/CONTRACTS.md)
- Lint: `composer install && composer check` (PHPCS plus the palette contrast check)
- Theme Check (as CI runs it, on the `git archive` copy without dev files):
  `mkdir -p dist/campusinterface && git archive HEAD | tar -x -C dist/campusinterface && echo '{ "themes": [ "./dist/campusinterface" ] }' > .wp-env.override.json && npx --yes @wordpress/env@12 start && npx --yes @wordpress/env@12 run cli wp theme-check run campusinterface`

Requires WordPress 6.7+ and PHP 7.4+. GPL-2.0-or-later. © WPInterface, https://wpinterface.com
