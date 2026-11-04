# CampusInterface: what the theme consumes from Public LMS

The contracts themselves live in the plugin repository:
**[`plugins/public-lms/docs/CONTRACTS.md`](../../../plugins/public-lms/docs/CONTRACTS.md)**
(on GitHub: `wpinterface/public-lms`, `docs/CONTRACTS.md`). This file records the theme's side of
contract version **1.0.0**. A change to either side is a pull request on both repositories.

## Tested with

| CampusInterface | Public LMS | Contract |
|---|---|---|
| 0.1.0 | 0.1.0 | 1.0.0 |
| 0.2.0 (phase 1, in progress) | 0.1.0 (phase 1 not yet merged) | 1.0.0 |

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
| `campusinterface/course-grid` (3 columns), `course-grid-4`, `course-carousel` | Core Query Loop over `plms_course` with `"namespace":"publiclms/course-query"` (A5.5); Post Featured Image at the `campusinterface-course-card` size (480×270, registered by the theme); Post Title; Paragraphs bound to `publiclms/course-field` keys `level`, `lesson_count`, `duration`, `price`; in the 3-column grid a Button bound to `enroll_url` (url) and `enroll_label` (text), falling back to "View course" | The theme's `query_loop_block_query_vars` filter returns no posts while `plms_course` is unregistered (WordPress would otherwise swap in `post`), so each pattern shows its "New courses are on their way" message |
| `campusinterface/category-tiles`, the footer course links | Links to `/course-category/{slug}/` (the plugin's `plms_course_category` rewrite base) for the subjects Data and analytics, Web development, Design, Communication, Business and marketing, Career skills | Links 404 until the plugin and those terms exist; site owners edit them |
| Hero, CTA and header buttons | `campusinterface_courses_url()`: the `plms_course` archive link, or `/courses/` | Links to `/courses/` |

All other patterns are plain core blocks with static content and work on any site.

## B. Tokens the theme provides

Every token the plugin reads is defined in `theme.json`, so none of the plugin's fallbacks apply on
CampusInterface.

| Contract token | CampusInterface value |
|---|---|
| Colour roles `base`, `contrast`, `primary`, `primary-soft`, `secondary`, `accent`, `surface`, `line`, `success`, `warning`, `danger` | `settings.color.palette` in `theme.json`, and the same eleven slugs in `styles/colors/campus.json` and `styles/colors/studio.json` |
| Font sizes `xs`, `sm`, `base`, `lg`, `xl`, `2xl`, `3xl`, `4xl` | `settings.typography.fontSizes`, fluid from `base` up, between 360px and 1240px viewports |
| Spacing `20` to `80` | `settings.spacing.spacingScale`: 7 steps, ×1.5, medium (`50`) 1.5rem |
| `--wp--custom--radius--{sm,md,lg,pill}` | `settings.custom.radius`: 4px, 8px, 16px, 9999px |
| `--wp--preset--shadow--card` | `settings.shadow.presets`, slug `card` |

Every palette meets WCAG 2.2 AA (4.5:1) on all colour pairs listed in plugin contract B1;
`composer contrast` checks this in CI and fails the build otherwise.

Other theme decisions that plugin blocks inherit but do not depend on: `layout.contentSize` 720px,
`layout.wideSize` 1240px, root padding aware alignments, viewport breakpoints at 30rem (mobile) and 45rem
(tablet), and button `:hover`, `:focus` and `:active` styles on `core/button`.

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
