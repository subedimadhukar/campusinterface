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

**What the theme ships today (0.1.0):** none of the plugin's six template slugs. The plugin's own templates
(`publiclms//single-plms_course`, `archive-plms_course`, `single-plms_lesson`, `single-plms_quiz`,
`plms-dashboard`, `plms-instructor`) render inside CampusInterface's `header` and `footer` parts, which is
the contract's default path.

**Planned overrides** (phase 1, after the plugin's templates and patterns land, at least two weeks later):

| Theme file | Overrides | Adds |
|---|---|---|
| `templates/single-plms_course.html` | `publiclms//single-plms_course` | Hero section style, sticky enrol card in a sidebar column |
| `templates/archive-plms_course.html` | `publiclms//archive-plms_course` (also used for course category, tag and level archives) | Filters column, card section style |
| `templates/single-plms_lesson.html` | `publiclms//single-plms_lesson` | Distraction-free layout at content width, `lesson-nav` part |
| `templates/single-plms_quiz.html` | `publiclms//single-plms_quiz` | Narrow layout |
| `templates/plms-dashboard.html` | `publiclms//plms-dashboard` | Theme header with account menu |
| `templates/plms-instructor.html` | `publiclms//plms-instructor` | Same |

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
5. Theme parts the overrides may use: `header`, `footer` now; `lesson-nav` and `sidebar` from phase 1.

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
