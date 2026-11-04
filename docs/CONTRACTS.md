# CampusInterface: what the theme consumes from Public LMS

The contracts themselves live in the plugin repository:
**[`plugins/public-lms/docs/CONTRACTS.md`](../../../plugins/public-lms/docs/CONTRACTS.md)**
(on GitHub: [`subedimadhukar/public-lms`](https://github.com/subedimadhukar/public-lms/blob/main/docs/CONTRACTS.md), `docs/CONTRACTS.md`). This file records the theme's side of
contract version **1.3.0**. A change to either side is a pull request on both repositories.

## Tested with

| CampusInterface | Public LMS | Contract |
|---|---|---|
| 0.1.0 | 0.1.0 | 1.0.0 |
| 0.2.0 (phase 1, first pass) | 0.1.0 at commit 9b29002 (blocks, bindings, 12 of 16 patterns, no seed command) | 1.0.0 |
| 0.2.0 (phase 1 gate) | 0.1.0 at commit dd43e36 (seed command, contract 1.2.0). Full journey run with seeded data, see "Phase 1 integration status" | 1.2.0 |
| 0.3.0 (phase 2, part A) | 0.2.0 at 87af6a7 (quizzes) and 6661424 (assignments, certificates), then 0.3.0 at 9ec3484 (the same code with quizzes, assignments and a certificate in the seed), contract 1.3.0; clean builds of those commits. Seeded journey, see "Phase 2 integration status" | 1.3.0 |

## A. Templates and patterns

**What the theme ships (0.3.0):** overrides for all seven plugin slugs, including `single-plms_assignment` (1.3.0);
`plms-instructor` is overridden before the plugin registers it, as A1 allows. Each one uses exactly the plugin's slug (A3.1), composes the
`publiclms/*` patterns from A6 by slug, and replaces only the sections the theme designs itself with
`campusinterface/*` patterns. The post types do not exist without the plugin, so the templates never apply on
a site without it.

**Phase 2 patterns degrade cleanly (A6, 1.2.0 item 9).** Patterns the plugin has not registered yet are never
referenced directly. Each sits behind a small theme pattern that checks
`WP_Block_Patterns_Registry::is_registered()` at render time (`campusinterface_has_plugin_pattern()` in
`functions.php`) and outputs the plugin pattern when it exists, or a fallback until then:

| Area | Theme pattern | Before the plugin pattern exists |
|---|---|---|
| Course reviews (`publiclms/course-reviews`) | `campusinterface/hidden-course-reviews` | Nothing: no heading, no empty section |
| Instructor dashboard (`publiclms/instructor-dashboard`) | `campusinterface/hidden-instructor-dashboard` | Page title, a sentence and a button to the plugin's admin screen (`admin.php?page=publiclms`) |

When a phase 2 plugin registers the pattern, the same theme files show it with no theme release. Once a
pattern has landed, the theme references it directly and drops its fallback: the quiz patterns arrived in
contract 1.3.0, so `single-plms_quiz` now uses `publiclms/quiz-header` and `publiclms/quiz-runner` and
`campusinterface/hidden-quiz-body` is gone (0.3.0).

| Theme file | Overrides | Layout | Plugin patterns used | Theme pieces |
|---|---|---|---|---|
| `templates/single-plms_course.html` | `publiclms//single-plms_course` | Tinted hero (subject, title, excerpt, meta row, enrol button, featured image); two columns: description and course sections, then the `sidebar` part; related courses on a surface band | `course-curriculum`, `course-instructor`, `course-reviews` (through `hidden-course-reviews`), and `course-enroll-card` inside the `sidebar` part | `hidden-course-hero` (meta row and button bound to `publiclms/course-field`: `instructor`, `level`, `lesson_count`, `duration`, `enrolled_count`, `enroll_url`, `enroll_label`), `sidebar-course`, `hidden-related-courses` (`publiclmsRelated`) |
| `templates/archive-plms_course.html` | `publiclms//archive-plms_course` (also course category, tag and level archives) | Tinted archive header; a filters column (`<aside>` Group) beside an inherited Query Loop of classic cards, pagination and no-results | none: the archive header and grid are the theme's own | `hidden-course-filters` (course search scoped to `plms_course`, Terms Lists of `plms_course_category` and `plms_level`) |
| `templates/single-plms_lesson.html` | `publiclms//single-plms_lesson` | Distraction-free: `lesson-nav` part instead of the header (its course button is bound to `course_url` and `course_title`), content width, the course outline in a closed Details block, `footer-minimal` | `lesson-header`, `lesson-content`, `lesson-navigation`, and `lesson-sidebar` inside the Details block | `lesson-nav`, `hidden-lesson-contents` |
| `templates/single-plms_quiz.html` | `publiclms//single-plms_quiz` (registered from 1.3.0) | Same as the lesson: `lesson-nav` part, content width, the course outline in a closed Details block, `footer-minimal` | `quiz-header` (with the 1.3.0 quiz keys), `quiz-runner`, `lesson-navigation`, and `lesson-sidebar` inside the Details block | `lesson-nav`, `hidden-lesson-contents` |
| `templates/single-plms_assignment.html` | `publiclms//single-plms_assignment` (registered from 1.3.0) | Same as the lesson and the quiz | `lesson-header`, `assignment-submission` (brief, hand-in form, status, grade and feedback), `lesson-navigation`, and `lesson-sidebar` inside the Details block | `lesson-nav`, `hidden-lesson-contents` |
| `templates/plms-dashboard.html` | `publiclms//plms-dashboard` | `header-minimal` part, wide column, the page title as the `h1` (Post Title, Eyebrow style; the plugin's dashboard starts at `h2`), `footer-minimal` | `student-dashboard` | none |
| `templates/plms-instructor.html` | `publiclms//plms-instructor` (phase 2 part B in the plugin) | Same as the student dashboard | `instructor-dashboard` (through `hidden-instructor-dashboard`) | `hidden-instructor-dashboard` |

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

**Block styles in `theme.json` (B5).** `styles.blocks["publiclms/quiz"]` and `["publiclms/assignment"]` set
those blocks' own `h2` headings ("Questions", "Your result", "Your hand-in", "Hand in your work") to `xl`, the
size the plugin asks for. The plugin sets it at zero specificity, so without this the theme's global `h2`
(`3xl`) would win. The quiz's results use `success` and `danger` on `base` and `surface`, pairs
`composer contrast` already checks in every palette; the assignment's "Waiting for a grade" is `warning` on
`surface`, a pair B1 does not list, so the theme added it to its check (4.69:1 or better in all six palettes).

Other theme decisions that plugin blocks inherit but do not depend on: `layout.contentSize` 720px,
`layout.wideSize` 1240px, root padding aware alignments, viewport breakpoints at 30rem (mobile) and 45rem
(tablet), and button `:hover`, `:focus` and `:active` styles on `core/button`.

## Phase 2 integration status

**Part A, 2026-11-04, against Public LMS 87af6a7 (contract 1.3.0).** The plugin folder also holds uncommitted
work (assignments), so this run used a clean clone of 87af6a7, built in a scratch folder (`composer install
--no-dev`, `npm ci && npm run build`) and mounted with the theme's working copy into a WordPress 7.1.4 wp-env.
Data: `wp publiclms seed --courses=10`, plus a six-question quiz (one question of each type, 15-minute limit,
70% pass mark, 3 attempts) at the end of the Bookkeeping course's first section, built with the plugin's
`QuestionBank` and `QuizSettings` (the seed has no quizzes yet), and a `publiclms/video` block and a lesson
file on the preview lesson.

| Surface | Result in CampusInterface |
|---|---|
| Quiz template (`single-plms_quiz`, `quiz-header`, `quiz-runner`) | Theme override mirrors the lesson. Header shows the course button, section, title, the four quiz keys ("6 questions", "Time limit: 15 minutes", "Pass mark: 70%", "Attempts left: 3 of 3", then "2 of 3" after an attempt; "Unlimited attempts" when the limit is 0) and course progress (the quiz counts as an item: 6 / 7). Start by keyboard moves focus to "Questions"; all six question types answer by mouse and keyboard; submit moves focus to "Your result"; 100% shows "You passed", 19% shows the score in `danger`; Try again and Retake work. No console errors |
| Quiz results on the dashboard | "Quiz results" tab (roving tabs) with quiz, course, best score, Passed/Not passed badge, attempts and date |
| Lesson video and files (`publiclms/video`, `showAttachments`) | Self-hosted player, caption and the "Lesson files" panel render from theme tokens; see finding 9 for the panel heading |
| Curriculum types | Quiz item in the outline (course page and the lesson's Details block); section count "3 lessons, 1 quiz" |
| Accessibility | axe (WCAG 2.2 AA and best practices): quiz as a visitor, before start, running, failed and passed results, and the Quiz results tab, at 1280 and 375 px and again in the Dark variation: no violations. Keyboard pass on course, lesson, quiz and dashboard as the learner: no issues |
| Lighthouse budgets (`lighthouserc.json`) | All pass against 87af6a7: performance 99–100, accessibility 100, LCP 1.7–1.8 s, at most 49 KB script |
| Assignment template (6661424: `single-plms_assignment`, `assignment-submission`) | New theme override, laid out like the lesson. Brief, "Hand in your work" with text and file fields and the accepted types; by keyboard: type the answer, attach a file, Hand in. The page reloads with "Your hand-in", "Waiting for a grade" in `warning`, the file and the answer in a closed Details block, and "Hand in again"; course progress counts the hand-in (7 / 8). Focus starts at the top after the reload (finding 10) |
| Certificates (6661424) | Dashboard "Certificates" tab: course, completion date, certificate ID, "Download PDF". The enrol card in the theme's `sidebar` part shows "Download your certificate" to the learner who completed the course. The certificate itself is a PDF from the plugin's own template, so the theme has no certificate template to ship (contract 1.3.0 item 11) |
| Accessibility, assignments and certificates | axe on the assignment (visitor, and learner after a hand-in), the dashboard with the Certificates tab and the course with the certificate button, in all five colour variations: no violations from the theme or the plugin. Keyboard pass on the assignment at 1280 and 375 px: no issues |

Assignments and certificates were checked the same way against a clean build of 6661424, with the quiz above
and an assignment after it in the Bookkeeping course's first section (the seed had neither then). Public LMS
9ec3484 (0.3.0) then put quizzes, assignments and a certificate in `wp publiclms seed` with no contract or
source change: on that seed the Lighthouse URLs still exist and the budgets pass, and axe finds nothing on a
seeded quiz and assignment (visitor and learner), the dashboard and the course.

**Still waiting on the plugin (not in 6661424):** course reviews (`publiclms/course-reviews`,
still behind `hidden-course-reviews`), Q&A, announcements, the instructor dashboard and `plms-instructor`
(still behind `hidden-instructor-dashboard`), `publiclms/course-filters` (the archive keeps the theme's own
filters), and checkout.

## Phase 1 integration status

**Done, 2026-11-04, against Public LMS dd43e36 (contract 1.2.0)**, mounted unchanged into the theme's wp-env
(WordPress 7.1.4, http://localhost:8930). Data from the plugin's own seed command, `wp publiclms seed
--courses=10`: ten courses in two sections of three lessons each (60 lessons), three instructors, six learners,
18 enrolments with some progress, and the `/my-learning/` dashboard page. The journey was run as a logged-out
visitor and as the seeded learner `sita.gurung`.

| Step | Visitor | Learner |
|---|---|---|
| Course archive (`/courses/`, theme `archive-plms_course`) | Classic cards with bound level, lesson count, duration and price; theme filter column (course search, subject and level Terms Lists) | Same |
| Single course (theme `single-plms_course`) | Hero button bound to `enroll_label`/`enroll_url` reads "Log in to enrol"; plugin curriculum (sections, preview badge, durations) and instructor fill the main column; plugin enrol card in the `sidebar` part; related courses did not show the current course (by coincidence, see finding 11); reviews area absent | Hero and enrol card read "Continue learning" with the progress bar (33%, 2 / 6); curriculum shows completion ticks |
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
| 2 | Related courses | `"query":{"publiclmsRelated":true}` on `publiclms/course-query` | `hidden-related-courses` uses it. The phase 1 check that the current course is left out was a coincidence of dates: the setting never applies on the front end (finding 11) |
| 3 | Archive filters | `publiclms/course-filters` is phase 2; the plugin never injects into a theme's filter column | Theme keeps its Search and Terms Lists |
| 4 | Form field colours on other themes | Plugin block CSS sets field background, text and border from its aliases | Nothing to change; the theme's own zero-specificity field rule stays for core blocks such as Search |
| 5 | `2-xl` slugs in `theme.json` references | B2 wording added | Theme already uses `2-xl` to `4-xl` |
| 6 | Variation detection | `isActive` matches on `namespace` (A5.5) | Nothing to change |
| 7 | Font size slugs in plugin patterns | Patterns use B2 slugs only (A5.8) | Checked: plugin sections take the theme's sizes |
| 8 | Pattern wrappers in columns | Column and sidebar patterns use `"layout":{"type":"default"}` (A5.7) | Workaround removed from `single-plms_course` |
| 9 | Phase 2 patterns not registered | Documented in A6 | Reviews, quiz and instructor dashboard areas go through conditional theme patterns |

## Plugin findings from the 1.2.0 run (for the plugin; nothing changed in the plugin folder)

**Status at 87af6a7:** 1 to 3 are fixed (commit 40f9aed) and checked in the theme: the filled next-lesson link
reads 7.9:1, seeded lessons use `h2`, and 1 of 6 shows 17%.

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

Numbering continues from the 1.2.0 run above. **Status at 6661424:** 4 to 9 are all still open (checked in the
source of that commit; for 7, the new quiz runner moves focus to its headings itself, but Mark complete still
loses it).

4. **Progress bars fill from the left in right-to-left languages (RTL, medium).** Found in the theme's RTL pass
   (site language Arabic, `<html dir="rtl">`, Public LMS at 40f9aed). `publiclms/course-progress` and the
   student dashboard cards place the fill with `inset: 0 auto 0 0`. The build's `style-index-rtl.css` keeps that
   unchanged (rtlcss does not flip the `inset` shorthand), so on the learner's dashboard a 33% bar is filled at
   the left end (fill `left: 0`, `right: 171px` of a 256px track) while every other element mirrors. Suggested
   fix: `inset-block: 0; inset-inline-start: 0;` (logical, no RTL build step needed) in
   `src/blocks/course-progress/style.scss` and `src/blocks/student-dashboard/style.scss`. Everything else on
   plugin pages mirrors correctly: curriculum, enrol card, lesson navigation (Next on the left), dashboard tabs.
5. **Lesson counts and progress drop to "0 of 0" under a translation plugin (multilingual, medium).** Found in the
   theme's multilingual passes (Polylang 3.9.1 with `plms_course`, `plms_lesson`, `plms_quiz` and
   `plms_assignment` set as translatable; seen with English plus a Devanagari-script language, and again with
   English, Arabic and Japanese on 0.3.0 at 9ec3484, where every dashboard, English included, shows the courses of
   the other languages as "0 of 0 steps"). `CourseStructureRepository` loads sections and items with `get_posts()` and
   `suppress_filters => true`, but Polylang adds its language condition on `parse_query`, which
   `suppress_filters` does not skip. On the learner's dashboard every course whose lessons are in another
   language than the page reads "0 of 0 lessons · 0%" with "Start learning", including a course the learner
   finished (100% on the English dashboard, 0% on the others); the curriculum of such a course is empty. Suggested
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
7. **Keyboard focus is lost after Mark complete (accessibility, high).** Found in the theme's keyboard pass
   (Public LMS 40f9aed, seeded learner). Tab to "Mark as complete", press Space or Enter: the save works and
   the live region announces it, but when the request finishes focus is on `<body>`, so the next Tab starts
   from the top of the page (WCAG 2.4.3). Cause: the button has `data-wp-bind--disabled="context.isBusy"`
   (`src/blocks/mark-complete/render.php`), and disabling the focused button drops focus. Suggested fix: keep
   the button enabled and use `aria-disabled` while busy, ignoring presses until the request returns (or
   move focus back to the button once it is re-enabled). Same check for any other busy state built this way
   (quiz submit, enrol).
8. **The plugin's Playground blueprint installs an unbuilt plugin (packaging, low until the public beta).**
   `playground.json` installs Public LMS with `git:directory` from `main`, but `build/` and `vendor/` are
   git-ignored and blocks register from `build/blocks/`, so Playground would get a plugin without its blocks or
   Action Scheduler. The theme's `blueprint.json` therefore installs the plugin from
   `https://github.com/subedimadhukar/public-lms/releases/latest/download/public-lms.zip`. Request: have the
   release workflow attach the `public-lms.zip` it already builds to each GitHub release (or publish to
   WordPress.org), and point `playground.json` at the same zip. Checked with a release-like zip in
   `@wp-playground/cli` 3.1.60: activation, `wp publiclms seed` (with `WP_ENVIRONMENT_TYPE` `local`) and the
   course, lesson and dashboard blocks all work in Playground on PHP 8.3.
9. **Plugin heading sizes lose to the theme's heading sizes (design, low).** The plugin sizes its own headings
   at zero specificity, for example `:where(.wp-block-publiclms-lesson-content__attachments-title)` with
   `--publiclms-font-size-lg`, the quiz's "Questions" and "Your result" with `xl`, and the dashboard greeting
   with `2-xl`. A block theme's `h2` element style (`:root :where(h2)`) always wins, so on CampusInterface they
   render at the theme's `h2` size, 40px. The "Lesson files" panel heading is then larger than the lesson's
   section headings around it. The theme corrects the quiz through `styles.blocks["publiclms/quiz"]` in
   `theme.json`, and keeps the larger dashboard greeting on purpose, but cannot reach "Lesson files" without
   also shrinking the lesson's own content headings (both are inside `publiclms/lesson-content`). Suggested fix:
   give these headings a preset class in the markup (`has-lg-font-size`, `has-xl-font-size`), which WordPress
   prints for every theme that defines the B2 sizes, and keep the zero-specificity rule as the fallback.
10. **After handing in an assignment, focus starts at the top of the page (accessibility, low), and B1 misses a
    pair (contract wording).** The hand-in form posts and the page reloads, so a keyboard or screen reader user
    lands at the start of the document with nothing pointing at the new "Your hand-in" status. Suggested fix:
    after the reload, move focus to the status heading (it already has an `id`), or update in place as the quiz
    runner does. Separately, "Waiting for a grade" is `warning` on `surface` (the status panel), which B1's
    "Text partner" column does not list; please add it so themes check it. CampusInterface passes it in all six
    palettes and now checks it in CI.
11. **`publiclmsRelated` and `publiclmsHideEnrolled` never apply on the front end (high).** `CourseQuery::query_vars()`
    returns early unless `$block->context['query']['namespace']` is `publiclms/course-query`, but core passes the
    Query block's `query` attribute as context, and A5.5 (rightly) puts `namespace` beside it as a separate block
    attribute, as both the theme's `hidden-related-courses` and the plugin's own `course-grid` do. Logged on 9ec3484:
    the context keys are `perPage … inherit, publiclmsRelated` with no `namespace`, and the vars come back without
    `post__in`. So related courses are just the newest courses: on an Arabic or Japanese course, the only course in
    that language, "You might also like" lists the course itself, and the English row is right only because
    Bookkeeping is not among the three newest. The phase 1 check that the current course is left out was this
    coincidence. Suggested fix: read the namespace from the Query block (for example keep it from
    `render_block_data` for `core/query` blocks in a static, or check `$block->context['query']` for the
    `publiclms*` keys alone), and add an e2e check with the current course among the newest. The theme keeps
    the contract's markup and does not work around it.
