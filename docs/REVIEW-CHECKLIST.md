# WordPress.org theme review checklist

Checked against the [required review guidelines](https://make.wordpress.org/themes/handbook/review/required/)
and the [accessibility-ready guidelines](https://make.wordpress.org/themes/handbook/review/accessibility/required/)
on 2026-11-04, for CampusInterface 0.3.0 (phase 2, end of the theme-only work), on the distributable copy that
`git archive` builds (dev files are `export-ignore`d in `.gitattributes`). Phase 1 results are kept where the
phase 2 run did not replace them; rows marked "phase 2" are new.

Legend: **Pass**, **N/A** (does not apply to this theme), **Owner** (needs a decision or account action by
WPInterface before submission).

## How it was checked

| Check | Command | Result |
|---|---|---|
| Theme Check | `mkdir -p dist/campusinterface && git archive HEAD \| tar -x -C dist/campusinterface`, then wp-env with `"themes": [ "./dist/campusinterface" ]` in `.wp-env.override.json`, then `npx @wordpress/env@12 run cli wp theme-check run campusinterface` | 0.3.0, on WordPress 6.7.11 and 7.1.4: no REQUIRED, WARNING or RECOMMENDED results; two INFO notes (accessibility-ready tag triggers an accessibility review; one text domain, `campusinterface`) |
| PHPCS (WordPress-Extra, WordPress-Docs, PHPCompatibilityWP 7.4+) | `composer lint` | Clean |
| Palette contrast, six palettes × 17 pairs | `composer contrast` | 102 of 102 pass AA; lowest 4.63:1 (Kids, `success` on `surface`). Phase 2 added `warning` on `surface` (Public LMS assignment status), lowest 4.69:1 |
| Block validity | Editor on WordPress 7.1.4 and on 6.7.11 (the minimum to test; 6.7.0 rejects underscores in plugin template names; second wp-env with `"core": "https://wordpress.org/wordpress-6.7.11.zip"` mounting the `git archive` copy, theme pattern cache cleared before each run): `wp.blocks.parse()` over every theme pattern (rendered by PHP, from REST), template and part file, before every phase 2 commit | 49 patterns, 17 templates, 10 parts (after the quiz fallback was removed and the assignment template added for contract 1.3.0): no invalid or missing blocks on either version. On 6.7.11 nothing needs a deprecation; on 7.1.4 resized images in six patterns go through core's Image deprecation (markup follows 6.7 where the versions differ), which the editor applies silently |
| PHP notices | `WP_DEBUG` and `WP_DEBUG_LOG` on, log cleared first; front page, landing, log-in, every pattern, posts page, page, single post, category, author, date and search archives (results and none), 404, feed, course archive, course category and level, course, open and gated lessons, quiz, both dashboards; as a visitor and as the seeded learner; on 7.1.4 and 6.7.11 (phase 2, 100 requests on each) | Nothing logged by the theme on either version. Editor loads log one warning from Public LMS (`docs/CONTRACTS.md`, "Plugin findings" 6) |
| Lighthouse 12.8.2, accessibility only, five more pages (log-in template, landing page, card styles, core block page, pattern sampler) | `npx lighthouse@12 <url> --only-categories=accessibility` | 100 on each |
| Lighthouse 12.8.2, accessibility, Public LMS pages with seeded data (contract 1.2.0 run) | `wp publiclms seed --courses=10`, then `npx lighthouse@12 <url> --only-categories=accessibility`, as a visitor and with the learner's cookie in `--extra-headers` | Visitor: 100 on the course archive, a single course, two lessons, the dashboard, a quiz and the instructor dashboard template; 98 on the open preview lesson (`heading-order` in the plugin's seeded lesson text). Learner: 98–100; the extra flag is core's admin bar (`aria-allowed-role`). Details and a plugin contrast bug in `docs/CONTRACTS.md` |
| Lighthouse CI budgets (phase 2) | `lighthouserc.json` with `@lhci/cli@0.15.1`, three runs per page, median run; CI job `.github/workflows/lighthouse.yml` (skips cleanly when Public LMS is not reachable) | Reproduced locally in a fresh wp-env laid out as on CI (theme and plugin side by side, `WP_DEBUG` off, `bin/lighthouse-seed.sh`): all assertions pass on the academy home, course archive, Bookkeeping course and its preview lesson. Measured: performance 99–100, accessibility 100, FCP 1.4–1.7 s, LCP 1.7–2.1 s, CLS 0, TBT 0 ms; 126–148 KB per page (44–47 KB script, 2–9 KB CSS, 57 KB fonts); no third-party request except one Gravatar image on the course page (core avatars in the plugin's instructor block), which the matrix allows there only. The no-token probe was checked against the private repository (skip) and a public one (run) |
| axe-core 4.13 on every template (phase 2) | `@axe-core/playwright`, tags `wcag2a`, `wcag2aa`, `wcag21a`, `wcag21aa`, `wcag22aa` and `best-practice`; 24 views covering all 16 templates of the part 1 run (the 17th, `single-plms_assignment`, was audited with contract 1.3.0, see `docs/CONTRACTS.md`) (`index` through a test-only mu-plugin, since nothing on the site reaches it), every inserter pattern, a post with threaded comments, Public LMS pages with seeded data; at 1280 and 375 px as a visitor, as the learner and as an instructor; the academy home, core block page, log-in, course archive, course, lesson, dashboard and 404 again under each colour variation (Campus, Studio, Kids, Corporate, Dark) | No WCAG violations anywhere. Best-practice issues found and fixed: the posts page and `index` had no `<h1>` (new `campusinterface/hidden-blog-heading`); the dashboard templates had no `<h1>` because the plugin's dashboard starts at `<h2>` (Post Title as an `<h1>` in the Eyebrow style, now also offered for Post Title, above the plugin's greeting in `plms-dashboard` and `plms-instructor`; taken out of the instructor fallback so it stays when the plugin pattern lands); the comment form title was an `<h3>` straight after the `<h1>` on posts without comments (`comment_form_defaults` makes it an `<h2>`); the log-in template's coloured half was outside any landmark (now the page's `<header>`). Left: logged in, core's admin bar (`aria-allowed-role`) and, because the admin bar comes first, axe no longer recognises core's skip link as one (`region`); both are core. On a fresh site with no menu yet, core's Navigation fallback puts the Page List's `<ul>` straight inside the navigation's `<ul>` (axe `list`, serious); Twenty Twenty-Five does the same on that site, and it goes away once a menu exists. The Public LMS quiz (contract 1.3.0) was audited in all its states too, see `docs/CONTRACTS.md`, "Phase 2 integration status" |
| Keyboard pass (phase 2) | Playwright, keyboard only, on 15 pages at 1280 and 375 px (visitor), course, lessons and dashboard as the learner, instructor dashboard as an instructor: first stop, Enter on it and the next stop; every Tab stop with its focused and blurred computed styles; hidden or off-screen stops; positive `tabindex`; Enter on Details; the phone overlay | Skip link is the first stop on every page, visible on focus, and moves the next Tab into `<main>`. No positive `tabindex`, no stop on a hidden element, tab order follows the reading order (recorded sequences checked page by page). Every stop changes visibly on focus except one, fixed: core's Search block with the button inside removes the field's outline and draws nothing instead (course filters); `assets/css/blocks/search.css` rings the field's frame with `:focus-within`. Details open and close with Enter. Overlay: "Open menu" has `aria-haspopup="dialog"`, opens a modal dialog labelled "Menu" with focus inside, Tab stays inside (30 of 30), Escape closes it and returns focus to the button. Plugin issue found: focus drops to `<body>` after Mark complete (`docs/CONTRACTS.md`, "Plugin findings" 7); the dashboard tabs follow the tabs pattern (roving `tabindex`, arrow keys) |
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
| Visible focus on menus, form fields, submit buttons, text links | Pass | Links and buttons: `:focus-visible` in `theme.json`; fields, summaries, menu toggles and the carousel: `assets/css/global.css`; log-in fields: `assets/css/blocks/loginout.css`; Details summary: `assets/css/blocks/details.css`; Search fields with the button inside: `assets/css/blocks/search.css` (phase 2). Every Tab stop on 15 pages checked for a visible change ("Keyboard pass" above) |
| Everything reachable and operable by keyboard, on all screen sizes | Pass | Core navigation overlay (modal dialog: focus moves in, stays in, Escape returns it to the menu button), Details blocks, scroll-snap carousel (tab into each card link). No hover-only controls. Checked at 1280 and 375 px in the phase 2 keyboard pass |

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
| Only design and presentation | Pass | Phase 2 PHP is presentational too: `comment_form_defaults` only changes the form title's heading level, and `campusinterface_privacy_policy_url()` reads core's privacy page setting for the footer link |

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
| Right-to-left languages (`rtl-language-support` tag) | Pass | Phase 2 RTL pass, 2026-11-04: site language Arabic (`wp language core install ar --activate`, `<html dir="rtl" lang="ar">`), WordPress 7.1.4, Public LMS seeded. Full-page screenshots at 1280 and 375 px of the academy home, landing, log-in, pattern sampler (every pattern), card styles, core block page, page, single post, category, search, 404, course archive, course category, single course, preview and gated lessons, quiz, student and instructor dashboards, as a visitor and as the learner; the mobile navigation overlay open. No horizontal overflow anywhere (only core's hidden admin-bar name sits off-screen on phones). Fixed: the Quote bar and padding were physical (`border.left` in `theme.json`) and stayed on the left; now `border-inline-start` and `padding-inline-start` in `assets/css/blocks/quote.css`. Fixed: Safari breaks Arabic letter joins under letter-spacing (eyebrow, badge, event month, headings); `global.css` sets `letter-spacing: normal` for Arabic-script languages (Chrome and Firefox already ignore it). All other theme CSS already used logical properties. Plugin issue found: progress bars fill from the left in RTL (`docs/CONTRACTS.md`, "Plugin findings") |
| Works on a multilingual site | Pass | Phase 2 multilingual pass, 2026-11-04: Polylang 3.9.1 (dev wp-env only, `.wp-env.json`), English default and Nepali (`ne_NP`, `/ne/`), courses, lessons, quizzes and their terms set as translatable; one seeded course, its lessons and the test quiz moved to Nepali; Nepali pages for the academy home, landing, pattern sampler, every inserter pattern, log-in, page, post, category, search, 404, course archive and category, course, two lessons, quiz, student and instructor dashboards. A pseudo-translation of the theme POT (every string becomes `⟦ne:…⟧`, compiled into `wp-content/languages/themes/` in the env, never committed) shows any untranslatable string as plain English: none in the theme, as a visitor or as the enrolled learner (enrol, Mark complete and the dashboard run in Nepali). Pattern titles and descriptions (49 each), template, part, custom template and section style titles are all in the POT. English left on Nepali pages is user content (the `wp_navigation` menu, titles, site title), core's feed `<link>` titles and Public LMS binding values and blocks (no Nepali translation of the plugin yet). Fixed: translated figures at display size ran into the next column of the statistics band; `global.css` now lets text wrap inside its column (`overflow-wrap`), with no change to any English layout (screenshots and element boxes identical at 375 and 1280 px). Fixed: footer privacy links now use `get_privacy_policy_url()` (falls back to `/privacy-policy/`), so each language links to its own privacy page. Pattern links to sample pages (events, pricing, contact) are placeholders the site owner edits; the course catalogue link already follows the language. Polylang's navigation language switcher works in the header and the overlay; in vertical menus Polylang's own CSS centres its items (`align-self: center`), a Polylang issue the theme does not override. Plugin issue found: lesson counts and progress read "0 of 0" for courses in another language (`docs/CONTRACTS.md`, "Plugin findings") |
| Text domain is the slug, declared in `style.css` | Pass | `campusinterface` |
| At most two text domains | Pass | One |

## 9. Files

| Requirement | Status | Notes |
|---|---|---|
| Complete, no code meant for other versions | Pass | |
| No VCS folders, hidden files, zips or disallowed files | Pass | `git archive` output holds only `assets/`, `languages/`, `parts/`, `patterns/`, `styles/`, `templates/`, `functions.php`, `readme.txt`, `screenshot.png`, `style.css`, `theme.json` (rechecked at 0.3.0: `blueprint.json`, `lighthouserc.json`, `bin/`, `docs/` and `.github/` stay out) |
| One line-ending type | Pass | LF only |
| All assets bundled; no CDNs or remote fetches | Pass | |
| `style.css` headers complete | Pass | Theme Name, Author, Description, Version, Requires at least, Tested up to, Requires PHP, License, License URI, Text Domain |
| Theme URI points to the theme; Author URI about the author | **Owner** | `https://wpinterface.com/themes/campusinterface/` must exist before submission |
| Tags from the Theme Tag List | Pass | Includes `education` and `accessibility-ready`; `rtl-language-support` and `translation-ready` were checked in phase 2 (section 8) |
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
| Meaningful landmark roles and names | Pass | `<header>`, `<main>`, `<footer>` from template parts and groups; every navigation has an `aria-label` (Main, Footer, Course categories, Academy, Help); course sidebar and archive filters are `<aside>`; the log-in template's coloured half is its `<header>` (phase 2) |
| Keyboard navigation | Pass | See section 3 and the phase 2 keyboard pass |
| Controls with names, roles and states | Pass | Core blocks only (navigation toggles, Details, buttons, Login/out) |
| Labelled form fields | Pass | Search blocks keep their label (visually hidden where `showLabel` is false); `wp_login_form()` labels |
| Meaningful heading structure | Pass | One `h1` per template or full-page pattern (hero, post title, archive title, the "Blog" heading on `home` and `index`, the page title on both dashboards); sections `h2`, cards `h3`; the comment form title is an `h2`; site title is a paragraph. axe `heading-order` and `page-has-heading-one` pass on every template |
| Underlined links in text | Pass | `styles.elements.link` underlines; only navigation and post-title links drop the underline |
| No ambiguous link text | Pass | No "Read more"; course cards link only from the title. Buttons have distinct labels ("Book a place", "Register", "Reserve your place") |
| Contrast of text and UI controls | Pass | `composer contrast`, all six palettes; form-field borders use `contrast`; axe `color-contrast` on rendered pages under all five colour variations (phase 2) |
| Alternative text | Pass | Every content image has alt text; the ten icons beside headings are decorative and have `alt=""` (WCAG technique H67) |
| Accessible audio, video and animation | Pass | No media and no animation in the theme; `prefers-reduced-motion` rule in `global.css` |
| Reflow, resize, text spacing | Pass | Fluid type and grids down to 320px; tested at 375px; long translated words and figures wrap inside their column (phase 2, section 8) |
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

## Owner actions for the public beta (outside WordPress.org)

1. Add a `PUBLIC_LMS_TOKEN` repository secret (read access to `wpinterface/public-lms`) so the Lighthouse
   workflow runs; until then it is skipped. Remove it once the plugin repository is public.
2. For the Playground link: make both repositories public and have the plugin's release workflow attach
   `public-lms.zip` to each GitHub release (plugin finding 8), then open the blueprint link in `README.md` once
   to check it.
