# CampusInterface: what the theme consumes from Public LMS

The contracts themselves live in the plugin repository:
**[`plugins/public-lms/docs/CONTRACTS.md`](../../../plugins/public-lms/docs/CONTRACTS.md)**
(on GitHub: `wpinterface/public-lms`, `docs/CONTRACTS.md`). This file records the theme's side of
contract version **1.0.0**. A change to either side is a pull request on both repositories.

## Tested with

| CampusInterface | Public LMS | Contract |
|---|---|---|
| 0.1.0 | 0.1.0 | 1.0.0 |

## A. Templates and patterns

**What the theme ships today (0.1.0):** none of the plugin's six template slugs. The plugin's own templates
(`publiclms//single-course`, `archive-course`, `single-lesson`, `single-quiz`, `page-dashboard`,
`page-instructor`) render inside CampusInterface's `header` and `footer` parts, which is the contract's
default path.

**Planned overrides** (phase 1, after the plugin's templates and patterns land, at least two weeks later):

| Theme file | Overrides | Adds |
|---|---|---|
| `templates/single-course.html` | `publiclms//single-course` | Hero section style, sticky enrol card in a sidebar column |
| `templates/archive-course.html` | `publiclms//archive-course` | Filters column, card section style |
| `templates/single-lesson.html` | `publiclms//single-lesson` | Distraction-free layout at content width, `lesson-nav` part |
| `templates/single-quiz.html` | `publiclms//single-quiz` | Narrow layout |
| `templates/page-dashboard.html` | `publiclms//page-dashboard` | Theme header with account menu |
| `templates/page-instructor.html` | `publiclms//page-instructor` | Same |

Rules the theme follows (plugin contract A3 to A5):

1. Overrides use exactly the plugin's slugs and compose plugin patterns (`publiclms/*`), core blocks,
   plugin blocks and the theme's own patterns (`campusinterface/*`).
2. The theme never registers a pattern in the `publiclms/` namespace.
3. When the theme ships its first override, `functions.php` gains the hierarchy guard from plugin contract
   A5.6: if `post_type_exists( 'plms_course' )` is false, the six slugs are removed from the template
   hierarchy so the theme's copies never render for another plugin's `course`, `lesson` or `quiz` types.
4. Theme parts the overrides may use: `header`, `footer` now; `lesson-nav` and `sidebar` from phase 1.

**Patterns that use plugin data today:**

| Theme pattern | Uses | Behaviour without the plugin |
|---|---|---|
| `campusinterface/course-grid` | Core Query Loop with `postType: plms_course`; Post Featured Image at the `campusinterface-course-card` size (480×270, registered by the theme); Post Title; the `plms_course` archive link | Shows "New courses are on their way"; the button links to `/courses/` |

From phase 1 the course grid adds the `publiclms/course-query` namespace and Paragraph and Button blocks bound
to `publiclms/course-field` (`price`, `level`, `lesson_count`, `enroll_url`).

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
