# WordPress.org theme review checklist

Checked against the [required review guidelines](https://make.wordpress.org/themes/handbook/review/required/)
and the [accessibility-ready guidelines](https://make.wordpress.org/themes/handbook/review/accessibility/required/)
on 2026-11-04, for CampusInterface 0.2.0 (phase 1 gate), on the distributable copy that `git archive` builds
(dev files are `export-ignore`d in `.gitattributes`).

Legend: **Pass**, **N/A** (does not apply to this theme), **Owner** (needs a decision or account action by
WPInterface before submission).

## How it was checked

| Check | Command | Result |
|---|---|---|
| Theme Check | `mkdir -p dist/campusinterface && git archive HEAD \| tar -x -C dist/campusinterface`, then wp-env with `"themes": [ "./dist/campusinterface" ]` in `.wp-env.override.json`, then `npx @wordpress/env@12 run cli wp theme-check run campusinterface` | No REQUIRED, WARNING or RECOMMENDED results; two INFO notes (accessibility-ready tag triggers an accessibility review; one text domain, `campusinterface`) |
| PHPCS (WordPress-Extra, WordPress-Docs, PHPCompatibilityWP 7.4+) | `composer lint` | Clean |
| Palette contrast, six palettes × 16 pairs | `composer contrast` | 96 of 96 pass AA; lowest 4.63:1 (Kids, `success` on `surface`) |
| Block validity | Editor on WordPress 7.1.4 and on 6.7.2 (the minimum; second wp-env with `"core": "https://wordpress.org/wordpress-6.7.2.zip"`): `wp.blocks.parse()` over every theme pattern, template and part | 49 patterns, 16 templates, 10 parts: no invalid or missing blocks on either version (rechecked after the contract 1.2.0 changes). Markup follows 6.7 where the versions differ (resized images without `height:auto`, legacy text alignment); 7.1 accepts it through core deprecations |
| PHP notices | `WP_DEBUG` and `WP_DEBUG_LOG` on; front page, pages on each page template, single post, category, date and search archives, 404; on 7.1.4 and 6.7.2 | Nothing logged |
| Lighthouse 12.8.2, accessibility only, five more pages (log-in template, landing page, card styles, core block page, pattern sampler) | `npx lighthouse@12 <url> --only-categories=accessibility` | 100 on each |
| Lighthouse 12.8.2, accessibility, Public LMS pages with seeded data (contract 1.2.0 run) | `wp publiclms seed --courses=10`, then `npx lighthouse@12 <url> --only-categories=accessibility`, as a visitor and with the learner's cookie in `--extra-headers` | Visitor: 100 on the course archive, a single course, two lessons, the dashboard, a quiz and the instructor dashboard template; 98 on the open preview lesson (`heading-order` in the plugin's seeded lesson text). Learner: 98–100; the extra flag is core's admin bar (`aria-allowed-role`). Details and a plugin contrast bug in `docs/CONTRACTS.md` |
| Lighthouse 12.8.2, academy home | `npx lighthouse@12 http://localhost:8930/academy-home/` (mobile) and `--preset=desktop`, two runs each on the final HEAD | Mobile: performance 99, accessibility 100, best practices 100, SEO 92 (FCP 1.2 s, LCP 1.8–1.9 s, CLS 0, TBT 0 ms). Desktop: 100, 100, 100, 92. The SEO point lost is "no meta description", which is SEO-plugin territory (guideline 6) |

## 1. Licensing and copyright

| Requirement | Status | Notes |
|---|---|---|
| GPL-compatible licence, GPLv2 or later recommended | Pass | `style.css` and `readme.txt`: GPLv2 or later |
| All code, data and images GPL-compatible | Pass | Fonts are OFL 1.1; every image is an original SVG made for the theme, GPLv2 or later |
| Copyright for the theme itself | Pass | `style.css` and `readme.txt` "Copyright" |
| Licence, copyright and source for bundled resources, in one file | Pass | `readme.txt` "Resources": Fraunces, Figtree, and the list of all 30 SVGs and `screenshot.png` |
| Original design, no clones | Pass | |
| Front-end copyright shows only the user's copyright | Pass | Footers show the site title only; no theme credit or copyright line |

## 2. Privacy

| Requirement | Status | Notes |
|---|---|---|
| No tracking or data collection by default | Pass | None. Fonts and images are local; no remote requests (front page references only the site's own host) |
| Document data use in readme | N/A | The theme collects nothing |

## 3. Accessibility (required for every theme)

| Requirement | Status | Notes |
|---|---|---|
| Skip link, first focusable, visible on focus, moves focus to main | Pass | WordPress adds it for block themes when a template has `<main>`; every template has exactly one `<main>` |
| Visible focus on menus, form fields, submit buttons, text links | Pass | Links and buttons: `:focus-visible` in `theme.json`; fields, summaries, menu toggles and the carousel: `assets/css/global.css`; log-in fields: `assets/css/blocks/loginout.css`; Details summary: `assets/css/blocks/details.css` |
| Everything reachable and operable by keyboard, on all screen sizes | Pass | Core navigation overlay (keyboard and touch), Details blocks, scroll-snap carousel (tab into each card link). No hover-only controls |

## 4. Code

| Requirement | Status | Notes |
|---|---|---|
| No PHP or JavaScript errors, warnings or notices | Pass | See "PHP notices" above. The theme ships no JavaScript |
| Secure; sanitise input, escape output | Pass | No input handled. All pattern output escaped (`esc_html_e`, `esc_attr__`, `esc_url`); PHPCS `WordPress.Security` clean |
| No deprecated functions | Pass | PHPCS and Theme Check |
| Unique prefix (4+ letters) for everything public | Pass | `campusinterface_` functions, `campusinterface-` handles, image size, block style names, pattern categories, pattern slugs |

## 5. Functionality and features

| Requirement | Status | Notes |
|---|---|---|
| No preview manipulation, no activation redirects, admin bar untouched | Pass | |
| Admin notices | N/A | None |
| No paywalled WordPress features | Pass | |
| Non-presentational hooks left in place | Pass | |
| No custom post types, blocks, roles, contact methods, mime types or shortcodes | Pass | Courses come from the Public LMS plugin. The only course-related PHP is a `query_loop_block_query_vars` filter that returns no posts for `plms_course` queries while the plugin is inactive (presentation: avoids blog posts appearing in course grids) |
| Only design and presentation | Pass | |

## 6. Plugins

| Requirement | Status | Notes |
|---|---|---|
| Recommend only WordPress.org plugins | **Owner** | `readme.txt` mentions Public LMS. Before submission it must be live on WordPress.org, or the mention must go |
| No bundled, auto-installed or auto-downloaded plugins | Pass | |
| No plugin territory (analytics, SEO, forms, social buttons…) | Pass | The newsletter pattern is a placeholder that asks for a forms plugin's block; the log-in panel uses core's Login/out block |

## 7. Naming, spelling and trademarks

| Requirement | Status | Notes |
|---|---|---|
| Name without "WordPress", "Theme" or "Twenty" | Pass | "CampusInterface" |
| "WordPress" spelled correctly | Pass | |
| No trademark violations; no WordPress logo | Pass | Partner logos in the logo strip are fictional organisations drawn for the theme |

## 8. Language and internationalisation

| Requirement | Status | Notes |
|---|---|---|
| All strings translatable | Pass | Every string is in a PHP pattern with gettext; templates and parts hold no text (they reference patterns) |
| Text domain is the slug, declared in `style.css` | Pass | `campusinterface` |
| At most two text domains | Pass | One |

## 9. Files

| Requirement | Status | Notes |
|---|---|---|
| Complete, no code meant for other versions | Pass | |
| No VCS folders, hidden files, zips or disallowed files | Pass | `git archive` output holds only `assets/`, `languages/`, `parts/`, `patterns/`, `styles/`, `templates/`, `functions.php`, `readme.txt`, `screenshot.png`, `style.css`, `theme.json` |
| One line-ending type | Pass | LF only |
| All assets bundled; no CDNs or remote fetches | Pass | |
| `style.css` headers complete | Pass | Theme Name, Author, Description, Version, Requires at least, Tested up to, Requires PHP, License, License URI, Text Domain |
| Theme URI points to the theme; Author URI about the author | **Owner** | `https://wpinterface.com/themes/campusinterface/` must exist before submission |
| Tags from the Theme Tag List | Pass | Includes `education` and `accessibility-ready` |
| Valid `readme.txt`, one Contributors username, short description ≤ 150 characters | Pass / **Owner** | 103 characters. `Contributors: wpinterface` must be the WordPress.org account that submits |
| Original files for minified ones; no bundled core libraries | Pass | Nothing minified; no jQuery |
| No images of recognisable children, hate or violence | Pass | Portraits are faceless illustrations of adults |
| Screenshot ≤ 1200×900, 4:3, not an advert | Pass | 1200×900 render of the academy home page (wp-env, site title "Lakeside Academy") |

## 10. Classic themes

N/A: CampusInterface is a block theme.

## 11. Block themes

| Requirement | Status | Notes |
|---|---|---|
| `style.css`, `readme.txt`, `theme.json`, `templates/index.html` | Pass | |
| Templates complete, with correct closing tags | Pass | Every template and part parses with no invalid blocks |

## 12. Settings pages and onboarding

N/A: no settings pages, options or onboarding.

## 13. Selling, credits, links and spam

| Requirement | Status | Notes |
|---|---|---|
| At most one front-facing credit link (Theme or Author URI) | Pass | None |
| No upselling on the front end; disclose affiliates | Pass | None |
| No spam in description, readme or starter content | Pass | |

## 14. Author and upload restrictions

**Owner**: one new theme in the queue at a time, disclose all accounts.

## Accessibility-ready guidelines

| Guideline | Status | How |
|---|---|---|
| Skip to content link | Pass | Core skip link |
| Meaningful landmark roles and names | Pass | `<header>`, `<main>`, `<footer>` from template parts and groups; every navigation has an `aria-label` (Main, Footer, Course categories, Academy, Help); course sidebar and archive filters are `<aside>` |
| Keyboard navigation | Pass | See section 3 |
| Controls with names, roles and states | Pass | Core blocks only (navigation toggles, Details, buttons, Login/out) |
| Labelled form fields | Pass | Search blocks keep their label (visually hidden where `showLabel` is false); `wp_login_form()` labels |
| Meaningful heading structure | Pass | One `h1` per template or full-page pattern (hero, post title or archive title); sections `h2`, cards `h3`; site title is a paragraph |
| Underlined links in text | Pass | `styles.elements.link` underlines; only navigation and post-title links drop the underline |
| No ambiguous link text | Pass | No "Read more"; course cards link only from the title. Buttons have distinct labels ("Book a place", "Register", "Reserve your place") |
| Contrast of text and UI controls | Pass | `composer contrast`, all six palettes; form-field borders use `contrast` |
| Alternative text | Pass | Every content image has alt text; the ten icons beside headings are decorative and have `alt=""` (WCAG technique H67) |
| Accessible audio, video and animation | Pass | No media and no animation in the theme; `prefers-reduced-motion` rule in `global.css` |
| Reflow, resize, text spacing | Pass | Fluid type and grids down to 320px; tested at 375px |
| No unexpected changes of context | Pass | |
| No new windows without warning | Pass | No `target="_blank"` |
| Content on hover or focus accessible | Pass | No hover-revealed content beyond core submenus |
| Accessibility statement | Pass | `readme.txt` "Accessibility" section, and the `campusinterface/accessibility-statement` pattern for site owners |
| No inaccessible plugins recommended | Pass | Public LMS is held to the same contract |
| Screen reader text supported | Pass | Core `.screen-reader-text` styles are present in block themes |

## Before submission (owner)

1. Publish Public LMS on WordPress.org first, or remove the plugin mention from `readme.txt`.
2. Make the Theme URI page live.
3. Confirm the `Contributors` username.
4. Run Theme Check again on the final zip and attach the result to the Trac ticket.
