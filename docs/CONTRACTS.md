# CampusInterface: what the theme consumes from Public LMS

The contracts themselves live in the plugin repository:
**[`plugins/public-lms/docs/CONTRACTS.md`](../../../plugins/public-lms/docs/CONTRACTS.md)**
(on GitHub: `wpinterface/public-lms`, `docs/CONTRACTS.md`). This file records the theme's side of
contract version **1.2.0**. A change to either side is a pull request on both repositories.

## Tested with

| CampusInterface | Public LMS | Contract |
|---|---|---|
| 0.1.0 | 0.1.0 | 1.0.0 |
| 0.2.0 (phase 1, first pass) | 0.1.0 at commit 9b29002 (blocks, bindings, 12 of 16 patterns, no seed command) | 1.0.0 |
| 0.2.0 (phase 1 gate) | 0.1.0 at commit dd43e36 (seed command, contract 1.2.0). Full journey run with seeded data, see "Phase 1 integration status" | 1.2.0 |

## A. Templates and patterns

**What the theme ships (0.2.0):** overrides for all six plugin slugs (A1 lets a theme ship all six although
the plugin registers four in phase 1). Each one uses exactly the plugin's slug (A3.1), composes the
`publiclms/*` patterns from A6 by slug, and replaces only the sections the theme designs itself with
`campusinterface/*` patterns. The post types do not exist without the plugin, so the templates never apply on
a site without it.

**Phase 2 patterns degrade cleanly (A6, 1.2.0 item 9).** The four patterns the plugin registers only from
phase 2 are never referenced directly. Each sits behind a small theme pattern that checks
`WP_Block_Patterns_Registry::is_registered()` at render time (`campusinterface_has_plugin_pattern()` in
`functions.php`) and outputs the plugin pattern when it exists, or a fallback until then:

| Area | Theme pattern | Before the plugin pattern exists |
|---|---|---|
| Course reviews (`publiclms/course-reviews`) | `campusinterface/hidden-course-reviews` | Nothing: no heading, no empty section |
| Quiz body (`publiclms/quiz-header`, `publiclms/quiz-runner`) | `campusinterface/hidden-quiz-body` | Quiz title and a short "not open yet" note. Post Content is left out because Public LMS keeps quiz content closed in phase 1 |
| Instructor dashboard (`publiclms/instructor-dashboard`) | `campusinterface/hidden-instructor-dashboard` | Page title, a sentence and a button to the plugin's admin screen (`admin.php?page=publiclms`) |

When a phase 2 plugin registers the pattern, the same theme files show it with no theme release.

| Theme file | Overrides | Layout | Plugin patterns used | Theme pieces |
|---|---|---|---|---|
| `templates/single-plms_course.html` | `publiclms//single-plms_course` | Tinted hero (subject, title, excerpt, meta row, enrol button, featured image); two columns: description and course sections, then the `sidebar` part; related courses on a surface band | `course-curriculum`, `course-instructor`, `course-reviews` (through `hidden-course-reviews`), and `course-enroll-card` inside the `sidebar` part | `hidden-course-hero` (meta row and button bound to `publiclms/course-field`: `instructor`, `level`, `lesson_count`, `duration`, `enrolled_count`, `enroll_url`, `enroll_label`), `sidebar-course`, `hidden-related-courses` (`publiclmsRelated`) |
| `templates/archive-plms_course.html` | `publiclms//archive-plms_course` (also course category, tag and level archives) | Tinted archive header; a filters column (`<aside>` Group) beside an inherited Query Loop of classic cards, pagination and no-results | none: the archive header and grid are the theme's own | `hidden-course-filters` (course search scoped to `plms_course`, Terms Lists of `plms_course_category` and `plms_level`) |
| `templates/single-plms_lesson.html` | `publiclms//single-plms_lesson` | Distraction-free: `lesson-nav` part instead of the header (its course button is bound to `course_url` and `course_title`), content width, the course outline in a closed Details block, `footer-minimal` | `lesson-header`, `lesson-content`, `lesson-navigation`, and `lesson-sidebar` inside the Details block | `lesson-nav`, `hidden-lesson-contents` |
| `templates/single-plms_quiz.html` | `publiclms//single-plms_quiz` (phase 2 in the plugin) | `lesson-nav` part, narrow 40rem column, `footer-minimal` | `quiz-header`, `quiz-runner` (through `hidden-quiz-body`) | `hidden-quiz-body` |
| `templates/plms-dashboard.html` | `publiclms//plms-dashboard` | `header-minimal` part, wide column, `footer-minimal` | `student-dashboard` | none |
| `templates/plms-instructor.html` | `publiclms//plms-instructor` (phase 2 in the plugin) | Same as the student dashboard | `instructor-dashboard` (through `hidden-instructor-dashboard`) | `hidden-instructor-dashboard` |

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
| `campusinterface/hidden-related-courses` | Query Loop with `"namespace":"publiclms/course-query"` and `"query":{"publiclmsRelated":true}` (A5.5, 1.2.0): leaves out the current course and prefers its categories | Not used: it only appears in the course template |
| `campusinterface/lesson-nav` (the `lesson-nav` part) | Outline Button bound to `course_url` (url) and `course_title` (text), 1.1.0 keys | Where no course is in context the binding returns nothing and the button keeps its own text and link: "All courses", to `campusinterface_courses_url()` |
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

**Done, 2026-11-04, against Public LMS dd43e36 (contract 1.2.0)**, mounted unchanged into the theme's wp-env
(WordPress 7.1.4, http://localhost:8930). Data from the plugin's own seed command, `wp publiclms seed
--courses=10`: ten courses in two sections of three lessons each (60 lessons), three instructors, six learners,
18 enrolments with some progress, and the `/my-learning/` dashboard page. The journey was run as a logged-out
visitor and as the seeded learner `sita.gurung`.

| Step | Visitor | Learner |
|---|---|---|
| Course archive (`/courses/`, theme `archive-plms_course`) | Classic cards with bound level, lesson count, duration and price; theme filter column (course search, subject and level Terms Lists) | Same |
| Single course (theme `single-plms_course`) | Hero button bound to `enroll_label`/`enroll_url` reads "Log in to enrol"; plugin curriculum (sections, preview badge, durations) and instructor fill the main column; plugin enrol card in the `sidebar` part; related courses leave out the current course; reviews area absent | Hero and enrol card read "Continue learning" with the progress bar (33%, 2 / 6); curriculum shows completion ticks |
| Lesson (theme `single-plms_lesson`) | Gated: the plugin's "Log in and enrol" panel; the preview lesson opens; the `lesson-nav` button reads the course title and links to the course | Mark complete flips to "Completed", the progress bar moves from 16% to 33% without a reload, the live region announces "Progress saved. Course progress 33%."; previous and next links work |
| Student dashboard (`/my-learning/`, theme `plms-dashboard` via the plugin's hierarchy filter) | "Log in to see your courses and progress" | In progress (2) and Completed (1) tabs; cards show "2 of 6 lessons · 33%" after the lesson above |
| Quiz (theme `single-plms_quiz`, test quiz) | Quiz title and the theme's "not open yet" note | Same |
| Instructor Dashboard page template | Page title, sentence, "Open course tools" button | Same |

Token use: on live plugin blocks every `--publiclms-*` alias equals the theme's value (31 of 31), and plugin
buttons carry `wp-element-button`, so they take the theme's button style. No theme CSS targets plugin classes.

Lighthouse accessibility (12.8.2, mobile) with seeded data: 100 on every page above for the visitor except the
preview lesson (98, see "Plugin findings" 2). Logged in as the learner, 98 to 100: besides finding 2, the only
other flag is core's admin bar (`<li role="group">`, `aria-allowed-role`), which logged-in visitors see on every
theme.

Theme changes from this run: `hidden-related-courses` uses `publiclmsRelated`; the `lesson-nav` part binds a
course button to `course_url` and `course_title`; the course description is back to a default (full column)
layout now that plugin column patterns fill their column (the 9b29002 workaround is gone); the main course
column spaces its sections at `spacing|60`; reviews, quiz and instructor dashboard areas degrade through the
three conditional patterns above.

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

## Open items for the plugin: closed in contract 1.2.0

All nine items the theme raised at 1.0.0 are settled (plugin `docs/CONTRACTS.md`, "Changes in 1.2.0").

| # | Item | Resolution | Theme side |
|---|---|---|---|
| 1 | Course link on lessons and quizzes | 1.1.0 keys `course_title` and `course_url` | `lesson-nav` binds its course button to them |
| 2 | Related courses | `"query":{"publiclmsRelated":true}` on `publiclms/course-query` | `hidden-related-courses` uses it; checked: the current course is left out |
| 3 | Archive filters | `publiclms/course-filters` is phase 2; the plugin never injects into a theme's filter column | Theme keeps its Search and Terms Lists |
| 4 | Form field colours on other themes | Plugin block CSS sets field background, text and border from its aliases | Nothing to change; the theme's own zero-specificity field rule stays for core blocks such as Search |
| 5 | `2-xl` slugs in `theme.json` references | B2 wording added | Theme already uses `2-xl` to `4-xl` |
| 6 | Variation detection | `isActive` matches on `namespace` (A5.5) | Nothing to change |
| 7 | Font size slugs in plugin patterns | Patterns use B2 slugs only (A5.8) | Checked: plugin sections take the theme's sizes |
| 8 | Pattern wrappers in columns | Column and sidebar patterns use `"layout":{"type":"default"}` (A5.7) | Workaround removed from `single-plms_course` |
| 9 | Phase 2 patterns not registered | Documented in A6 | Reviews, quiz and instructor dashboard areas go through conditional theme patterns |

## Plugin findings from the 1.2.0 run (for the plugin; nothing changed in the plugin folder)

1. **Next-lesson link text disappears once a lesson is complete (accessibility, high).** After Mark complete,
   and on every later load of a completed lesson, the next link gets `is-ready`. The plugin styles it with
   `:where(.wp-block-publiclms-lesson-navigation__link.is-next.is-ready) { color: var(--publiclms-color-base); }`
   on a `--publiclms-color-primary` background, at zero specificity. Core's global link rule
   `a:where(:not(.wp-element-button)) { color: var(--wp--preset--color--primary) }` (0,0,1), present on every
   block theme that sets a link colour, wins, so the text is primary on primary (1:1, invisible). Measured on
   CampusInterface: text and background both `rgb(67, 56, 202)`. Suggested fix: give the state rule at least
   (0,1,1), for example `.wp-block-publiclms-lesson-navigation .wp-block-publiclms-lesson-navigation__link.is-next.is-ready`
   (and its `:hover`/`:focus-visible`), or colour the inner `__label` and `__title` spans, which inherit from
   the anchor only when nothing else sets `color`. The theme cannot fix it without targeting a plugin class.
2. **Seeded lesson content skips a heading level.** Seeded lessons put "Try this" in an `<h3>` straight under
   the lesson's `<h1>`, which Lighthouse flags (`heading-order`) on every open lesson. Suggested fix: `<h2>` in the
   seed content.
3. **Rounding (minor).** One of six lessons shows as "16%" on the dashboard and progress bar; 16.7% usually
   rounds to 17%.

## Plugin findings from the theme's phase 2 work (for the plugin; nothing changed in the plugin folder)

Numbering continues from the 1.2.0 run above.

4. **Progress bars fill from the left in right-to-left languages (RTL, medium).** Found in the theme's RTL pass
   (site language Arabic, `<html dir="rtl">`, Public LMS at 40f9aed). `publiclms/course-progress` and the
   student dashboard cards place the fill with `inset: 0 auto 0 0`. The build's `style-index-rtl.css` keeps that
   unchanged (rtlcss does not flip the `inset` shorthand), so on the learner's dashboard a 33% bar is filled at
   the left end (fill `left: 0`, `right: 171px` of a 256px track) while every other element mirrors. Suggested
   fix: `inset-block: 0; inset-inline-start: 0;` (logical, no RTL build step needed) in
   `src/blocks/course-progress/style.scss` and `src/blocks/student-dashboard/style.scss`. Everything else on
   plugin pages mirrors correctly: curriculum, enrol card, lesson navigation (Next on the left), dashboard tabs.
5. **Lesson counts and progress drop to "0 of 0" under a translation plugin (multilingual, medium).** Found in the
   theme's multilingual pass (Polylang 3.9.1, English and Nepali, with `plms_course`, `plms_lesson` and
   `plms_quiz` set as translatable). `CourseStructureRepository` loads sections and items with `get_posts()` and
   `suppress_filters => true`, but Polylang adds its language condition on `parse_query`, which
   `suppress_filters` does not skip. On the learner's dashboard every course whose lessons are in another
   language than the page reads "0 of 0 lessons · 0%" with "Start learning", including a course the learner
   finished (100% in English, 0% on the Nepali dashboard); the curriculum of such a course is empty. Suggested
   fix: add `'lang' => ''` to the structure queries (Polylang's documented switch; ignored without it), and test
   with WPML too, which reads `suppress_filters`. The dashboard listing all enrolled courses in every language
   is fine as it is.
6. **PHP warning on every block editor load (low).** `Capabilities::map_meta_cap()` runs
   `absint( $args[0] )` for every capability check before it looks at `$cap`. Core checks
   `current_user_can( 'edit_block_binding', $block_editor_context )` (`wp-includes/block-editor.php`), so
   `$args[0]` is a `WP_Block_Editor_Context` object and `debug.log` gets "Object of class
   WP_Block_Editor_Context could not be converted to int" each time the editor opens (traced with a
   temporary error handler, WordPress 7.1.4). Suggested fix: read the object ID only inside the plugin's own
   `case`s, or only when `is_scalar( $args[0] )`.
