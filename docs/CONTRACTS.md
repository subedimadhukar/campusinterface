# CampusInterface: what the theme consumes from Public LMS

The contracts themselves live in the plugin repository:
**[`plugins/public-lms/docs/CONTRACTS.md`](../../../plugins/public-lms/docs/CONTRACTS.md)**
(on GitHub: `wpinterface/public-lms`, `docs/CONTRACTS.md`). This file records the theme's side of
contract version **1.0.0**. A change to either side is a pull request on both repositories.

## Tested with

| CampusInterface | Public LMS | Contract |
|---|---|---|
| 0.1.0 | 0.1.0 | 1.0.0 |
| 0.2.0 (phase 1) | 0.1.0 at commit 9b29002 (phase 1 blocks, bindings source, course-query variation, 12 of 16 patterns; no seed command yet). Partial integration run, see below | 1.0.0 |

## A. Templates and patterns

**What the theme ships (0.2.0):** overrides for all six plugin slugs. Each one uses exactly the plugin's slug
(A3.1), composes the `publiclms/*` patterns from A6 by slug, and replaces only the sections the theme designs
itself with `campusinterface/*` patterns. Until Public LMS registers its patterns, those references render
nothing; the post types do not exist without the plugin, so the templates never apply on a site without it.

| Theme file | Overrides | Layout | Plugin patterns used | Theme pieces |
|---|---|---|---|---|
| `templates/single-plms_course.html` | `publiclms//single-plms_course` | Tinted hero (subject, title, excerpt, meta row, enrol button, featured image); two columns: description and course sections, then the `sidebar` part; related courses on a surface band | `course-curriculum`, `course-instructor`, `course-reviews`, and `course-enroll-card` inside the `sidebar` part | `hidden-course-hero` (meta row and button bound to `publiclms/course-field`: `instructor`, `level`, `lesson_count`, `duration`, `enrolled_count`, `enroll_url`, `enroll_label`), `sidebar-course`, `hidden-related-courses` |
| `templates/archive-plms_course.html` | `publiclms//archive-plms_course` (also course category, tag and level archives) | Tinted archive header; a filters column (`<aside>` Group) beside an inherited Query Loop of classic cards, pagination and no-results | none: the archive header and grid are the theme's own | `hidden-course-filters` (course search scoped to `plms_course`, Terms Lists of `plms_course_category` and `plms_level`) |
| `templates/single-plms_lesson.html` | `publiclms//single-plms_lesson` | Distraction-free: `lesson-nav` part instead of the header, content width, the course outline in a closed Details block, `footer-minimal` | `lesson-header`, `lesson-content`, `lesson-navigation`, and `lesson-sidebar` inside the Details block | `hidden-lesson-contents` |
| `templates/single-plms_quiz.html` | `publiclms//single-plms_quiz` | `lesson-nav` part, narrow 40rem column, `footer-minimal` | `quiz-header`, `quiz-runner` | none |
| `templates/plms-dashboard.html` | `publiclms//plms-dashboard` | `header-minimal` part, wide column, `footer-minimal` | `student-dashboard` | none |
| `templates/plms-instructor.html` | `publiclms//plms-instructor` | Same as the student dashboard | `instructor-dashboard` | none |

`theme.json` lists `plms-dashboard` ("Student Dashboard") and `plms-instructor` ("Instructor Dashboard") in
`customTemplates` with `"postTypes": [ "page" ]` (A3.2), next to the theme's own page templates
`page-no-title`, `page-landing` (no header or footer) and `page-login` (split log-in layout).

**Template parts.** `header`, `header-centered`, `header-large-title`, `header-minimal`, `footer`,
`footer-columns`, `footer-minimal`, `sidebar` (area `sidebar`), `lesson-nav` (area `lesson-nav`) and
`navigation-overlay` (area `navigation-overlay`). The theme adds the `sidebar` and `lesson-nav` areas with the
`default_wp_template_part_areas` filter, and `navigation-overlay` too on WordPress versions before 7.0. Every
part is a single `campusinterface/*` pattern reference, so its text is translatable.

Rules the theme follows (plugin contract A3 to A5):

1. Overrides use exactly the plugin's slugs and compose plugin patterns (`publiclms/*`), core blocks,
   plugin blocks and the theme's own patterns (`campusinterface/*`).
2. When the theme ships `plms-dashboard.html` or `plms-instructor.html`, `theme.json` gains matching
   `customTemplates` entries (`"postTypes": [ "page" ]`, titles "Student Dashboard" and "Instructor
   Dashboard") so they stay in the page template picker.
3. The theme never registers a pattern in the `publiclms/` namespace.
4. No hierarchy filtering is needed: the slugs are the plugin's post type keys or `plms-` prefixed, so the
   theme's copies can never render for another plugin's `course`, `lesson` or `quiz` post types or for an
   ordinary page named "Dashboard".
5. Theme parts the overrides use: the ten parts listed above.

**Patterns that use plugin data (0.2.0):**

| Theme pattern | Uses | Behaviour without the plugin |
|---|---|---|
| `campusinterface/course-grid` (3 columns), `course-grid-4`, `course-carousel` | Core Query Loop over `plms_course` with `"namespace":"publiclms/course-query"` (A5.5); Post Featured Image at the `campusinterface-course-card` size (480×270, registered by the theme); Post Title; Paragraphs bound to `publiclms/course-field` keys `level`, `lesson_count`, `duration`, `price`; the title is each card's only link (a repeated per-card enrol button would give every card the same link text, which accessibility-ready forbids). `enroll_url` and `enroll_label` are used on the single course hero instead | The theme's `query_loop_block_query_vars` filter returns no posts while `plms_course` is unregistered (WordPress would otherwise swap in `post`), so each pattern shows its "New courses are on their way" message |
| `campusinterface/category-tiles`, the footer course links | Links to `/course-category/{slug}/` (the plugin's `plms_course_category` rewrite base) for the subjects Data and analytics, Web development, Design, Communication, Business and marketing, Career skills | Links 404 until the plugin and those terms exist; site owners edit them |
| Hero, CTA and header buttons | `campusinterface_courses_url()`: the `plms_course` archive link, or `/courses/` | Links to `/courses/` |

All other patterns are plain core blocks with static content and work on any site.

## B. Tokens the theme provides

Every token the plugin reads is defined in `theme.json`, so none of the plugin's fallbacks apply on
CampusInterface.

| Contract token | CampusInterface value |
|---|---|
| Colour roles `base`, `contrast`, `primary`, `primary-soft`, `secondary`, `accent`, `surface`, `line`, `success`, `warning`, `danger` | `settings.color.palette` in `theme.json`, and the same eleven slugs in each colour variation: `styles/colors/campus.json`, `studio.json`, `kids.json`, `corporate.json` and `dark.json` |
| Font sizes `xs`, `sm`, `base`, `lg`, `xl`, `2xl`, `3xl`, `4xl` | `settings.typography.fontSizes`, fluid from `base` up, between 360px and 1240px viewports |
| Spacing `20` to `80` | `settings.spacing.spacingScale`: 7 steps, ×1.5, medium (`50`) 1.5rem |
| `--wp--custom--radius--{sm,md,lg,pill}` | `settings.custom.radius`: 4px, 8px, 16px, 9999px |
| `--wp--preset--shadow--card` | `settings.shadow.presets`, slug `card` |

Every palette meets WCAG 2.2 AA (4.5:1) on all colour pairs listed in plugin contract B1, plus `secondary`
on `surface` (the theme's checklist ticks); `composer contrast` (`php bin/check-contrast.php`) checks all six
palettes in CI and fails the build otherwise. In the Dark variation `base` is dark and `contrast` is light, so
plugin blocks invert with the rest of the page; `accent` is a deep violet there so that `contrast` text on it
still passes.

**Course cards.** Contract A5.4 says there is no `publiclms/course-card` block: course cards are core Post
Template, Post Featured Image, Post Title and bound Paragraph blocks. The theme styles them with five block
styles on `core/post-template` (Classic cards, Minimal cards, Overlay cards, List, Carousel; CSS in
`assets/css/blocks/post-template.css`) instead of a section style on a plugin block. If the plugin ever adds a
card block, add its name to `blockTypes` in `styles/blocks/card.json` and it picks up the Card section style.

Other theme decisions that plugin blocks inherit but do not depend on: `layout.contentSize` 720px,
`layout.wideSize` 1240px, root padding aware alignments, viewport breakpoints at 30rem (mobile) and 45rem
(tablet), and button `:hover`, `:focus` and `:active` styles on `core/button`.

## Phase 1 integration status

**Partial, run on 2026-11-04 against Public LMS 9b29002**, mounted unchanged into the theme's wp-env (WordPress
7.1.4) next to CampusInterface. The plugin had committed its eight blocks (`course-meta`, `course-progress`,
`curriculum`, `enroll-button`, `lesson-content`, `lesson-navigation`, `mark-complete`, `student-dashboard`),
the `publiclms/course-field` bindings source, the `publiclms/course-query` variation, its B5 token stylesheet and
12 of the 16 A6 patterns, but no seed command, so ten courses were created with WP-CLI instead (the cast from the
theme's patterns: titles, `plms_course_category` and `plms_level` terms, `_plms_access_mode`, `_plms_price`,
`_plms_duration`, featured images; no sections or lessons). Still to do when the plugin's seed command and
remaining patterns land: rerun with seeded sections, lessons, quizzes and an enrolled learner.

| Check | Result |
|---|---|
| Template precedence | `get_block_templates()` returns `campusinterface//single-plms_course`, `//single-plms_lesson` and `//plms-dashboard` (source `theme`) over the plugin's; the archive and term archives use the theme's `archive-plms_course` |
| Bindings in theme patterns | Course grid, carousel, related courses, archive cards and the single course hero show the plugin's values: level, lesson count, duration, price ("$49", "Free"), instructor, enrolled count, and "Enrol for free" or "Buy for $49" on the hero button |
| Plugin patterns in theme templates | `course-curriculum`, `course-instructor` and `course-enroll-card` (in the `sidebar` part) render on the single course; `lesson-header`, `lesson-content`, `lesson-navigation` and `lesson-sidebar` (inside the theme's Course contents Details) on lessons; `student-dashboard` on the dashboard template |
| Tokens on live plugin blocks | All 31 `--publiclms-*` aliases read on a real plugin block wrapper equal the theme's values; no fallback in use. The enrol button carries `wp-element-button`, so it takes the theme's button element style (primary background, Figtree, `radius--md`, theme padding) |
| Theme CSS aimed at plugin classes | None |
| Lighthouse (mobile) with the plugin active | Single course, course archive, a course category archive, a page of plugin blocks and the academy home: accessibility 100 and performance 99 on each |
| PHP notices | None from the theme or the plugin |

Theme-side change from the run: the course description in `single-plms_course` now uses a constrained layout so
it lines up with the plugin's constrained `course-curriculum` and `course-instructor` sections (see open item 8).

**Earlier the same day, before the plugin's blocks landed: Twenty Twenty-Five parity with core blocks.** A page of core blocks the plugin's
UI will sit next to (buttons, outline buttons, a striped table, Details with a list, Search, Quote, Separator)
plus a Group with the class `wp-block-publiclms-probe`, on CampusInterface and on Twenty Twenty-Five, in
wp-env (WordPress 7.1.4). The B5 alias layer was injected exactly as the contract writes it
(`:where([class*="wp-block-publiclms-"]) { --publiclms-…: var(--wp--preset--…, fallback) }`) and every alias
was read back from the probe:

| Theme | Contract tokens supplied by the theme | Plugin fallbacks used |
|---|---|---|
| CampusInterface 0.2.0 (default palette, and Dark) | 31 of 31: 11 colours, 8 font sizes, 7 spaces, 4 radii, `shadow--card` | none |
| Twenty Twenty-Five 1.5 | 9 of 31: `base`, `contrast`, spacing `20`–`80` | 22 (9 colours, 8 font sizes, 4 radii, the shadow) |

The probe inherits CampusInterface's body colour, font family (Figtree) and size, as B2 and B6 expect (plugin
blocks never set `font-family`). No theme stylesheet, `theme.json` entry or PHP filter targets a plugin class
(`grep -r publiclms assets styles theme.json style.css` finds nothing).

Theme-side fixes this turned up, all made in the theme:

- Core's Table "Stripes" style tints rows with a fixed `#f0f0f0`, which put light text on light rows in the
  Dark variation; `assets/css/blocks/table.css` now uses `surface` and `line`.
- Form fields kept the browser's white background in the Dark variation; `assets/css/global.css` gives
  `:where(input, select, textarea)` the `base` background and `contrast` text at zero specificity. Plugin form
  fields inherit this on CampusInterface, but see open item 4 for other themes.

## Open items for the plugin

Gaps the theme found while building against contract 1.0.0. Each is an addition (minor bump) unless noted.
The theme works around every one today; none blocks the phase 1 gate.

1. **Course link on lessons and quizzes.** The `lesson-nav` bar can link to the dashboard and the catalogue but
   not back to the current course: A7 has no key for it. Request: `course_url` and `course_title` keys on
   `publiclms/course-field`, resolved from the lesson or quiz context, bindable to Button `url`/`text` and
   Paragraph `content`.
2. **Related courses.** `campusinterface/hidden-related-courses` shows the three newest courses, which can
   include the course being viewed. Request: a `publiclms/course-query` attribute, for example
   `"query":{"publiclmsRelated":true}`, that excludes the current course and prefers its
   `plms_course_category` terms.
3. **Archive filters.** The archive's filter column is an `<aside>` Group whose inner Group has the class
   `campusinterface-course-filters` and the block name "Course filters"; it holds a core Search scoped to
   `plms_course` and Terms Lists of `plms_course_category` and `plms_level`. Request: a `publiclms/course-filters`
   block (level, price, duration) that the theme can place in that Group, documented in A6; until then the
   plugin should not inject into it.
4. **Form fields on other themes.** Quiz answers, dashboard filters and the checkout form should not rely on
   browser defaults for field colours: in a dark palette a white field with inherited light text is unreadable.
   Request: in the plugin's block CSS, `:where([class*="wp-block-publiclms-"]) :where(input, select, textarea)
   { background-color: var(--publiclms-color-base); color: var(--publiclms-color-contrast); border-color:
   var(--publiclms-color-contrast); }`. CampusInterface already does this globally, so it is not urgent here.
5. **Font size slugs in `theme.json` references (contract wording, patch).** B2 lists the slugs `2xl`, `3xl`,
   `4xl` and correctly gives the custom properties as `--2-xl` and so on, but a `theme.json` value written
   `var:preset|font-size|2xl` resolves to the undefined `--wp--preset--font-size--2xl`. CampusInterface had this
   bug from phase 0 to phase 1. Request: B2 should add that `theme.json` and block style references must use
   `var:preset|font-size|2-xl` (and `3-xl`, `4-xl`), including any `styles.blocks["publiclms/*"]` defaults the
   plugin ships.
6. **Query variation detection.** The theme's course grids, carousel, related courses and archive set
   `"namespace":"publiclms/course-query"` on the Query block. Request: the variation's `isActive` should match
   on `namespace` (not on `postType` alone), so the archive's inherited query and the theme's grids keep the
   variation's controls in the editor.
7. **Font size slugs in plugin patterns (contract conformance).** Several plugin patterns use core's default
   slugs, which are not in B2 and which CampusInterface does not define (it sets `defaultFontSizes: false`), so
   the text silently keeps its inherited size: `"fontSize":"small"` in `course-details`, `course-grid`,
   `course-hero`, `lesson-header` and `lesson-sidebar`; `"fontSize":"medium"` in `course-enroll-card` and
   `lesson-sidebar`; `"fontSize":"large"` in `course-grid` and `course-hero`. Request: use the contract slugs
   (`sm`, `base` or `lg`, `xl`), which every conforming theme defines.
8. **Pattern wrappers inside template columns.** `course-curriculum`, `course-instructor`, `course-details`,
   `course-enroll-card`, `lesson-sidebar` and others wrap their content in a Group with
   `"layout":{"type":"constrained"}`. Inside a theme's two-column course layout this centres the section at the
   global content width instead of filling the column. CampusInterface works around it (its course description
   is constrained too). Request: `"layout":{"type":"default"}` on wrappers of patterns meant for columns and
   sidebars, or `"justifyContent":"left"` as `lesson-header` already does.
9. **Patterns not registered yet.** `publiclms/course-reviews`, `quiz-header`, `quiz-runner` and
   `instructor-dashboard` (A6) are referenced by the theme's `single-plms_course`, `single-plms_quiz` and
   `plms-instructor` templates and currently render nothing.
