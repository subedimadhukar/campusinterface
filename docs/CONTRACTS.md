# CampusInterface: what the theme consumes from Public LMS

The contracts themselves live in the plugin repository:
**[`plugins/public-lms/docs/CONTRACTS.md`](../../../plugins/public-lms/docs/CONTRACTS.md)**
(on GitHub: [`subedimadhukar/public-lms`](https://github.com/subedimadhukar/public-lms/blob/main/docs/CONTRACTS.md), `docs/CONTRACTS.md`). This file records the theme's side of
contract version **1.6.0**. A change to either side is a pull request on both repositories.

Plugin commit hashes from `9a19222` on are the ones after the plugin's history rewrite of 2026-11-05
(`6661424` became `9a19222`, `9ec3484` became `7d72e4b`; earlier commits kept theirs).

## Tested with

| CampusInterface | Public LMS | Contract |
|---|---|---|
| 0.1.0 | 0.1.0 | 1.0.0 |
| 0.2.0 (phase 1, first pass) | 0.1.0 at commit 9b29002 (blocks, bindings, 12 of 16 patterns, no seed command) | 1.0.0 |
| 0.2.0 (phase 1 gate) | 0.1.0 at commit dd43e36 (seed command, contract 1.2.0). Full journey run with seeded data, see "Phase 1 integration status" | 1.2.0 |
| 0.3.0 (phase 2, part A) | 0.2.0 at 87af6a7 (quizzes) and 9a19222 (assignments, certificates), then 0.3.0 at 7d72e4b (the same code with quizzes, assignments and a certificate in the seed), contract 1.3.0; clean builds of those commits. Seeded journey, see "Phase 2 integration status" | 1.3.0 |
| 0.3.0 (phase 2, fix batch and commerce) | 0.3.0 at 8d055b6 (findings 4 to 11 fixed, checkout and orders, global seed, mPDF certificates), the plugin folder as built by the plugin session. Rerun in English, Arabic and Japanese, see "Phase 2 fix batch rerun" | 1.4.0 |
| 0.3.0 (UI foundation) | 0.3.0 at 97352aa (Stage 0: the `publiclms-ui` primitives, the dashboard's sections and router), a pinned `git worktree` of that commit outside `wp-content/plugins`, built with `npm ci && npm run build` and the plugin folder's `vendor-prefixed/`. See "Contract 1.5.0 rerun" | 1.5.0 |
| 0.3.0 (Stage 1 and the full-width dashboard) | 0.3.0 at 5c0e6b0 (branch `ui/student-dashboard`: Stage 1's focus layout, curriculum drawer, reviews, Q&A, announcements, course page, and the student dashboard of ADR-061), pinned and built the same way. See "Contract 1.6.0 rerun" | 1.6.0 |

## A. Templates and patterns

**What the theme ships (0.3.0):** overrides for six of the plugin's nine slugs: `single-plms_course`,
`archive-plms_course`, `single-plms_lesson`, `single-plms_quiz`, `single-plms_assignment` (1.3.0) and
`plms-instructor` (overridden before the plugin registers it, as A1 allows). Each one uses exactly the plugin's slug (A3.1), composes the
`publiclms/*` patterns from A6 by slug, and replaces only the sections the theme designs itself with
`campusinterface/*` patterns. The post types do not exist without the plugin, so the templates never apply on
a site without it.

**Left to the plugin (1.6.0):**
- `plms-dashboard-app`, the full-width student dashboard (sidebar, top bar, phone bottom bar). The theme no
  longer ships `plms-dashboard.html`, so the plugin applies `plms-dashboard-app` to the page in
  `publiclms_dashboard_page_id` (A1, 1.6.0 item 11), and its fonts and colours are the theme's tokens.
- `plms-dashboard`, the embedded dashboard inside the theme's `header` and `footer` parts. It stays in the page
  template picker as "Student Dashboard" for sites that want the dashboard inside their pages.
- `plms-focus`, "Focus Learning": opt-in (Settings → Learning pages, or picked per item). It uses no theme parts,
  and the plugin's own layout works with the theme's tokens, so the theme does not override it. By default
  lessons, quizzes and assignments keep the theme's templates, with the `lesson-nav` part and `footer-minimal`.

**Phase 2 patterns degrade cleanly (A6, 1.2.0 item 9).** Patterns the plugin has not registered yet are never
referenced directly. Each sits behind a small theme pattern that checks
`WP_Block_Patterns_Registry::is_registered()` at render time (`campusinterface_has_plugin_pattern()` in
`functions.php`) and outputs the plugin pattern when it exists, or a fallback until then:

| Area | Theme pattern | Before the plugin pattern exists |
|---|---|---|
| Instructor dashboard (`publiclms/instructor-dashboard`) | `campusinterface/hidden-instructor-dashboard` | Page title, a sentence and a button to the plugin's admin screen (`admin.php?page=publiclms`) |

When a phase 2 plugin registers the pattern, the same theme files show it with no theme release. Once a
pattern has landed, the theme references it directly and drops its fallback: the quiz patterns arrived in
contract 1.3.0, so `single-plms_quiz` now uses `publiclms/quiz-header` and `publiclms/quiz-runner` and
`campusinterface/hidden-quiz-body` is gone (0.3.0). Reviews arrived in 1.6.0: `single-plms_course` references
`publiclms/course-reviews` directly and `campusinterface/hidden-course-reviews` is gone. The new 1.6.0 blocks,
`publiclms/announcements` and `publiclms/course-qa`, are placed as blocks; on an older plugin they render nothing.

| Theme file | Overrides | Layout | Plugin patterns used | Theme pieces |
|---|---|---|---|---|
| `templates/single-plms_course.html` | `publiclms//single-plms_course` | Tinted hero (subject, title, excerpt, meta row, enrol button, featured image); two columns: description, announcements and course sections, then the `sidebar` part; related courses on a surface band | `course-curriculum`, `course-instructor` (the `instructor-card` block, 1.6.0), `course-reviews` (1.6.0), and `course-enroll-card` inside the `sidebar` part; the `publiclms/announcements` block after the description (`.publiclms-course-announcements`, 1.6.0) | `hidden-course-hero` (meta row and button bound to `publiclms/course-field`: `instructor`, `rating_summary` (1.6.0), `level`, `lesson_count`, `duration`, `enrolled_count`, `enroll_url`, `enroll_label`), `sidebar-course`, `hidden-related-courses` (`publiclmsRelated`) |
| `templates/archive-plms_course.html` | `publiclms//archive-plms_course` (also course category, tag and level archives) | Tinted archive header; a filters column (`<aside>` Group) beside an inherited Query Loop of classic cards, pagination and no-results | none: the archive header and grid are the theme's own | `hidden-course-filters` (course search scoped to `plms_course`, Terms Lists of `plms_course_category` and `plms_level`) |
| `templates/single-plms_lesson.html` | `publiclms//single-plms_lesson` | Distraction-free: `lesson-nav` part instead of the header (site title, "My dashboard" and log-out; the way back to the course is `lesson-header`'s course button), content width, the course outline in a closed Details block (on phones the plugin's drawer replaces it, see below), the collapsed Q&A after the content, `footer-minimal` | `lesson-header` (with the phones-only `curriculum-toggle`, 1.6.0), `lesson-content`, `lesson-navigation`, and `lesson-sidebar` inside the Details block; the `publiclms/course-qa` block, collapsed (`.publiclms-lesson-qa`, 1.6.0) | `lesson-nav`, `hidden-lesson-contents` |
| `templates/single-plms_quiz.html` | `publiclms//single-plms_quiz` (registered from 1.3.0) | Same as the lesson: `lesson-nav` part, content width, the course outline in a closed Details block, the collapsed Q&A, `footer-minimal` | `quiz-header` (with the 1.3.0 quiz keys and the phones-only `curriculum-toggle`), `quiz-runner`, `lesson-navigation`, and `lesson-sidebar` inside the Details block; `publiclms/course-qa`, collapsed | `lesson-nav`, `hidden-lesson-contents` |
| `templates/single-plms_assignment.html` | `publiclms//single-plms_assignment` (registered from 1.3.0) | Same as the lesson and the quiz | `lesson-header`, `assignment-submission` (brief, hand-in form, status, grade and feedback), `lesson-navigation`, and `lesson-sidebar` inside the Details block; `publiclms/course-qa`, collapsed | `lesson-nav`, `hidden-lesson-contents` |
| `templates/plms-instructor.html` | `publiclms//plms-instructor` (phase 2 part B in the plugin) | `header-minimal` part, wide column, the page title as the `h1` (Post Title, Eyebrow style), `footer-minimal` | `instructor-dashboard` (through `hidden-instructor-dashboard`) | `hidden-instructor-dashboard` |

**The lesson bar (1.6.0).** The `lesson-nav` part no longer carries a course button: `lesson-header` and
`quiz-header` already link back to the course right below it, and with 1.6.0's phones-only curriculum button
between the two, phones showed the course name twice in the first screen.

**The curriculum drawer (1.6.0 item 3).** `lesson-header` and `quiz-header` carry the phones-only "Course content"
button, which opens the course outline in the plugin's drawer. Once its script runs it adds
`publiclms-curriculum-drawer` to `<html>`; below 782px the theme then hides its own closed "Course contents"
Details (`.campusinterface-lesson-contents`, rule in `assets/css/blocks/details.css`), so phones get one way to
the outline, not two. Without JavaScript, and on wider screens, the Details stays. The theme's templates have no
sidebar column and no "always" toggle, so `publiclms-curriculum-hidden` needs nothing from the theme; it only
acts in the plugin's `plms-focus` layout.

`theme.json` lists `plms-instructor` ("Instructor Dashboard") in `customTemplates` with `"postTypes": [ "page" ]`
(A3.2), next to the theme's own page templates `page-no-title`, `page-landing` (no header or footer) and
`page-login` (split log-in layout). Its `plms-dashboard` entry went with the template file in 1.6.0; the plugin's
"Student Dashboard" and "Student Dashboard (full width)" are in the picker from the plugin. A translated copy of
the dashboard page (Polylang) is not the page in `publiclms_dashboard_page_id`, so it needs one of them picked.

**Template parts.** `header`, `header-centered`, `header-large-title`, `header-minimal`, `footer`,
`footer-columns`, `footer-minimal`, `sidebar` (area `sidebar`), `lesson-nav` (area `lesson-nav`) and
`navigation-overlay` (area `navigation-overlay`). The theme adds the `sidebar` and `lesson-nav` areas with the
`default_wp_template_part_areas` filter, and `navigation-overlay` too on WordPress versions before 7.0. Every
part is a single `campusinterface/*` pattern reference, so its text is translatable.

Rules the theme follows (plugin contract A3 to A5):

1. Overrides use exactly the plugin's slugs and compose plugin patterns (`publiclms/*`), core blocks,
   plugin blocks and the theme's own patterns (`campusinterface/*`).
2. When the theme ships a page template from A1 (now only `plms-instructor.html`), `theme.json` gains a matching
   `customTemplates` entry (`"postTypes": [ "page" ]`, title "Instructor Dashboard") so it stays in the page
   template picker.
3. The theme never registers a pattern in the `publiclms/` namespace.
4. No hierarchy filtering is needed: the slugs are the plugin's post type keys or `plms-` prefixed, so the
   theme's copies can never render for another plugin's `course`, `lesson` or `quiz` post types or for an
   ordinary page named "Dashboard".
5. Theme parts the overrides use: the ten parts listed above.

**Patterns that use plugin data (0.2.0):**

| Theme pattern | Uses | Behaviour without the plugin |
|---|---|---|
| `campusinterface/course-grid` (3 columns), `course-grid-4`, `course-carousel` | Core Query Loop over `plms_course` with `"namespace":"publiclms/course-query"` (A5.5); Post Featured Image at the `campusinterface-course-card` size (480×270, registered by the theme); Post Title; Paragraphs bound to `publiclms/course-field` keys `level`, `lesson_count`, `duration`, `price`, and from 1.6.0 the rating line under the title (`p.publiclms-course-card__rating`, `rating_summary`, as in the plugin's `course-grid`; also in `hidden-related-courses` and the archive template). A field with no value, such as the rating of a course without reviews, leaves an empty paragraph, which `global.css` hides in cards and flex rows; the title is each card's only link (a repeated per-card enrol button would give every card the same link text, which accessibility-ready forbids). `enroll_url` and `enroll_label` are used on the single course hero instead | The theme's `query_loop_block_query_vars` filter returns no posts while `plms_course` is unregistered (WordPress would otherwise swap in `post`), so each pattern shows its "New courses are on their way" message |
| `campusinterface/category-tiles`, the footer course links | Links to `/course-category/{slug}/` (the plugin's `plms_course_category` rewrite base) for the subjects Data and analytics, Web development, Design, Communication, Business and marketing, Career skills | Links 404 until the plugin and those terms exist; site owners edit them |
| `campusinterface/hidden-related-courses` | Query Loop with `"namespace":"publiclms/course-query"` and `"query":{"publiclmsRelated":true}` (A5.5, 1.2.0): leaves out the current course and prefers its categories | Not used: it only appears in the course template |
| `campusinterface/lesson-nav` (the `lesson-nav` part) | `publiclms_dashboard_page_id` for its "My dashboard" link. Until 1.6.0 it also had an Outline Button bound to `course_url` and `course_title`; it went once the plugin's `lesson-header` and `quiz-header` put the curriculum button beside their own course button, so phones showed the course name twice around it | The link falls back to `/dashboard/` |
| Hero, CTA and header buttons | `campusinterface_courses_url()`: the `plms_course` archive link, or `/courses/` | Links to `/courses/` |

All other patterns are plain core blocks with static content and work on any site.

## B. Tokens the theme provides

Every token the plugin reads is defined in `theme.json`, so none of the plugin's fallbacks apply on
CampusInterface.

| Contract token | CampusInterface value |
|---|---|
| Colour roles `base`, `contrast`, `primary`, `primary-soft`, `secondary`, `accent`, `surface`, `line`, `success`, `warning`, `danger`, and the optional `muted` (B8, 1.6.0) | `settings.color.palette` in `theme.json`, and the same twelve slugs in each colour variation: `styles/colors/campus.json`, `studio.json`, `kids.json`, `corporate.json` and `dark.json` |
| Font sizes `xs`, `sm`, `base`, `lg`, `xl`, `2xl`, `3xl`, `4xl` | `settings.typography.fontSizes`, fluid from `base` up, between 360px and 1240px viewports |
| Spacing `20` to `80` | `settings.spacing.spacingScale`: 7 steps, ×1.5, medium (`50`) 1.5rem |
| `--wp--custom--radius--{sm,md,lg,pill}` | `settings.custom.radius`: 4px, 8px, 16px, 9999px |
| `--wp--preset--shadow--card` | `settings.shadow.presets`, slug `card` |

Every palette meets WCAG 2.2 AA (4.5:1) on all colour pairs listed in plugin contract B1, plus `muted` on
`base`, `surface` and `primary-soft` (B8 asks for the first two; the dashboard's current menu item sits on the
third), and `secondary` on `surface` (the theme's checklist ticks); `composer contrast` (`php bin/check-contrast.php`) checks all six
palettes in CI and fails the build otherwise. In the Dark variation `base` is dark and `contrast` is light, so
plugin blocks invert with the rest of the page; `accent` is a deep violet there so that `contrast` text on it
still passes.

**Course cards.** Contract A5.4 says there is no `publiclms/course-card` block: course cards are core Post
Template, Post Featured Image, Post Title and bound Paragraph blocks. The theme styles them with five block
styles on `core/post-template` (Classic cards, Minimal cards, Overlay cards, List, Carousel; CSS in
`assets/css/blocks/post-template.css`) instead of a section style on a plugin block. If the plugin ever adds a
card block, add its name to `blockTypes` in `styles/blocks/card.json` and it picks up the Card section style.

**Block styles in `theme.json` (B5).** None are needed at 1.4.0. Under 1.3.0 the theme set the quiz's and the
assignment's own `h2` headings to `xl` through `styles.blocks`, because the plugin's zero-specificity size lost
to the theme's global `h2` (`3xl`); since 1.4.0 the plugin prints preset size classes on its headings
(finding 9), so those entries are gone. Form controls inside plugin blocks (the checkout's payment methods, quiz
choices) take the theme's generic `accent-color: primary` rule in `global.css`. The quiz's results use `success` and `danger` on `base` and `surface`, pairs
`composer contrast` already checks in every palette; the assignment's "Waiting for a grade" is `warning` on
`surface`, a pair B1 does not list, so the theme added it to its check (4.69:1 or better in all six palettes).

**UI primitives (B7, 1.5.0).** The theme styles the eight primitives through its tokens alone and adds no CSS on
`.publiclms-*` classes. Every primitive reads only the B5 aliases, which resolve to CampusInterface's presets
(checked element by element: cards `base` on a `line` border at `radius-md` 8px; panels `surface` at
`radius-lg` 16px; notices a tone-coloured start bar on `surface` at `radius-sm` 4px; badges pill-shaped at `xs`
in `primary-soft`, `accent` or the tone colour; tables and fields with `contrast` rules and borders; the empty
state a dashed `line` frame). The theme had no per-block plugin overrides left to drop, and its own focus rule
already skips `tabindex="-1"`, matching B7's script-focused headings. Two places where a theme's global element
styles beat a zero-specificity primitive were findings 14 and 16, both fixed in 1.6.0. The 1.6.0 drawer and
thread primitives resolve the same way (drawer: `base` panel, `line` edge, `contrast` backdrop at 45%, sliding
in from the start edge, so from the right in Arabic; thread: `line`-bordered `base` posts at `radius-md`, replies
set in from the start edge), and `.wp-element-button.is-secondary` now beats the theme's button element style
(1.6.0 item 13), so "Download PDF" and the other secondary buttons are outlined in `primary`.

**Dashboard frame (B8, 1.6.0).** The full-width dashboard takes the theme's fonts, colours and radii as they
are; the theme adds no CSS for it. Decisions:
- **`muted` preset: added.** One value per palette, at least 5:1 on `base` and `surface` and 4.7:1 on
  `primary-soft` (default `#68687f`, Campus `#5b6879`, Corporate `#646973`, Kids `#5f677e`, Studio `#696469`,
  Dark `#a3a4a9`), checked by `composer contrast`. Without it the plugin's `color-mix()` fallback would apply; it
  passes too, but in Kids only at 4.66:1 on `surface`.
- **Display face for content titles: already so.** `.publiclms-dashboard__lesson` (`h3`) and
  `.publiclms-dashboard__course-title` (`h3`) are headings, and the theme's heading element style sets the
  display face, so they render in Fraunces (in Latin-1 languages) or the system serif stack (all others) with no
  extra rule.
- **B2 sizes.** All five classes the dashboard headings carry (`has-base-font-size` to `has-2-xl-font-size`) are
  theme presets, so the plugin's sizes apply.
- **Corporate as the demo default: the owner's call**, not changed. The theme's default palette stays; Corporate
  is one click away in Styles.

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
| Assignment template (9a19222: `single-plms_assignment`, `assignment-submission`) | New theme override, laid out like the lesson. Brief, "Hand in your work" with text and file fields and the accepted types; by keyboard: type the answer, attach a file, Hand in. The page reloads with "Your hand-in", "Waiting for a grade" in `warning`, the file and the answer in a closed Details block, and "Hand in again"; course progress counts the hand-in (7 / 8). Focus starts at the top after the reload (finding 10) |
| Certificates (9a19222) | Dashboard "Certificates" tab: course, completion date, certificate ID, "Download PDF". The enrol card in the theme's `sidebar` part shows "Download your certificate" to the learner who completed the course. The certificate itself is a PDF from the plugin's own template, so the theme has no certificate template to ship (contract 1.3.0 item 11) |
| Accessibility, assignments and certificates | axe on the assignment (visitor, and learner after a hand-in), the dashboard with the Certificates tab and the course with the certificate button, in all five colour variations: no violations from the theme or the plugin. Keyboard pass on the assignment at 1280 and 375 px: no issues |

Assignments and certificates were checked the same way against a clean build of 9a19222, with the quiz above
and an assignment after it in the Bookkeeping course's first section (the seed had neither then). Public LMS
7d72e4b (0.3.0) then put quizzes, assignments and a certificate in `wp publiclms seed` with no contract or
source change: on that seed the Lighthouse URLs still exist and the budgets pass, and axe finds nothing on a
seeded quiz and assignment (visitor and learner), the dashboard and the course.

**Still waiting on the plugin (not in 5c0e6b0):** the instructor dashboard and `plms-instructor` (still behind
`hidden-instructor-dashboard`), and `publiclms/course-filters` (the archive keeps the theme's own filters).
Checkout landed in 1.4.0; course reviews, Q&A and announcements in 1.6.0, see below.

## Contract 1.6.0 rerun (Stage 1 and the full-width dashboard)

**2026-11-07, Public LMS 5c0e6b0** (branch `ui/student-dashboard`: main at 34d6ee8 with Stage 1, contract
items 1 to 10, plus the student dashboard of ADR-061, items 11 to 16). Same method as the 1.5.0 rerun: a pinned
`git worktree` outside `wp-content/plugins`, `npm ci && npm run build`, Composer's production packages
(`--no-scripts`) and the plugin folder's `vendor-prefixed/` (the Composer files are unchanged since 97352aa), on
the theme's wp-env (8930, WordPress 7.1.4) through its gitignored override. The site kept its 97352aa seed: the
seeder is unchanged and creates no reviews, questions or announcements. Those were posted through the real forms,
by keyboard: an announcement by `instructor`; a five-star review by `learner`, held and then approved (first
posts wait for approval by default); a question on the Bookkeeping preview lesson and one on the Arabic lesson,
answered by `instructor` and `instructor.wang`. The Arabic and Japanese copies of the dashboard page were
switched to "Student Dashboard (full width)". The worktree was removed afterwards and the env pointed back at
the plugin folder.

| Check | Result |
|---|---|
| Full-width dashboard (items 11 to 14) | `/my-learning/` and its Arabic and Japanese copies render `plms-dashboard-app`. The sidebar has the site's letter mark, name and tagline, the section menu with icons and counts, then "Browse courses" and "Back to site". The top bar has the greeting, a summary and the account menu, and the content column has an `h1`. Below 48rem the phone bottom bar shows the five sections. Theme tokens and fonts throughout: Fraunces and Figtree in English; in Arabic and Japanese, the system stacks (Chrome's platform-font report). The Dark variation inverts it cleanly. Arabic mirrors: sidebar on the right, progress filling from the right. Overview, Courses, Quiz results, Certificates and Orders answer 200, through `?section=` on the translated pages. Keyboard: the skip link targets the `<main>`, then the menu, account menu and content in order, at 1280 and 375 px |
| Visitors on the dashboard | The full-width page shows only the plugin's log-in notice, with no site header, footer, `main` or `h1` (finding 17) |
| Focus layout (items 1, 2, 4) | With "Use the focus layout" on, lessons, quizzes and assignments (English and Arabic) render `plms-focus` with the theme's tokens: top bar (Course content button, course link, progress ring), outline sidebar, Q&A, and on phones the sticky navigation row with Mark complete. On a wide screen, Enter on "Course content" collapses the sidebar (`html.publiclms-curriculum-hidden`, `aria-expanded="false"`, main column 851 → 1232px) and the choice survives a reload. With the option off, the theme's templates apply again |
| Drawer (items 3, 5) | On phones in the theme's lesson, quiz and assignment templates, "Course content" opens the `dialog`, focus on Close, the outline with the current item highlighted; it slides in from the right in Arabic. The theme's "Course contents" Details is hidden once the plugin's script has set its class. On wide screens the button stays hidden and the Details stays |
| Reviews (item 7) | Course page: score, stars, "Based on 1 review" and the spread of stars; the form for the learner (past 25%), the 25% notice for `learner.kim` (13%); reviews as cards. Posting by keyboard moves focus to the new review, marked "Waiting for approval". The star picker has no visible focus ring and faint empty stars (finding 18). The hero's meta row and the cards' rating line read "5.0 out of 5 · 1 review" on the reviewed course only; other cards show no gap where the line would be |
| Q&A (item 8) | A collapsed disclosure after the content, with its count badge; the question form; posts with "Answered" and "Instructor" badges; replies set in from the start edge (from the right in Arabic). Posting moves focus to the new post. A second post within 15 seconds gets core's "You are posting comments too quickly" in the form's alert, as the flood check intends. Its title on quizzes and assignments: finding 20 |
| Announcements (item 9) | After the description. Those who teach the course get a "Post an announcement" disclosure (title and message); the post shows a "New" badge; learners see it, visitors don't |
| Course page (item 10) | `course-instructor` is now the instructor card (Gravatar, linked name, "Instructor"). The `publiclms/course-content` starter pattern renders as ordinary post content in the theme's heading and list styles (checked on a temporary course, then deleted). Section heading sizes: finding 19 |
| Findings 12 to 16 | All fixed: 12, focus moves to "Start learning" after Enrol (47296eb); 13, the order view's "Price" header aligns with the amounts (ca7ee11); 14, the Courses cards' titles carry `has-lg-font-size` (f7c15f1, d725d7e); 15, the certificates column is headed "Download" and axe is clean (30b79b7); 16, section links are ink with no underline (0024942). Decision 4, the secondary button, is settled by item 13 |
| Accessibility | axe (WCAG 2.2 AA and best practices) on 21 views at 1280 and 375 px: dashboard sections in three languages, course (visitor, learner, `learner.kim`, instructor), lesson, quiz, assignment, Arabic lesson, archive, academy home. All clean except the visitor's dashboard (finding 17). The focus layout on 6 views at both widths: clean. Nine views with every disclosure opened (Q&A, reply forms, announcement form, curriculum), under the default palette and all five variations: clean. Keyboard pass on the dashboard, course, lesson, quiz, assignment and Arabic lesson at both widths: no theme issue (logged in, core's toolbar comes before the skip link, as before) |
| RTL | On the Arabic lesson the theme's `loginout`, `details` and `global` sheets are served as their `-rtl` copies, the global one on the Arabic dashboard; regenerating the copies changes nothing |
| Lighthouse budgets | In a fresh CI-like wp-env (WordPress 7.1.4, `WP_DEBUG` off, `bin/lighthouse-seed.sh`, the workflow's commands), every assertion passes on five URLs, the dashboard logged in as `learner`: performance 98–99, accessibility 100, FCP 1.35–1.69 s, LCP 1.81–1.99 s, TBT at most 12 ms, 44–50 KB script, 5–12 KB CSS, 136–150 KB per page. CLS is 0 everywhere except the lesson, 0.038 (it was 0 at 97352aa, finding 21). The dashboard weighs 138 KB with 9.1 KB of CSS and one Gravatar. Core's toolbar would add 42 KB of CSS there, so the seed turns it off for that one learner |
| Theme Check, PHPCS, contrast, validity | Theme Check on the `git archive` copy, WordPress 6.7.11 and 7.1.4: only the two usual INFO notes. PHPCS clean. `composer contrast`: six palettes pass, `muted` included. Block validity: 48 patterns, 16 templates and 10 parts valid on both versions |

## Contract 1.5.0 rerun (UI primitives)

**2026-11-05, Public LMS 97352aa** (Stage 0, the UI foundation), on the theme's wp-env (8930, WordPress 7.1.4)
pointed through its gitignored `.wp-env.override.json` at a **pinned `git worktree` of 97352aa** outside
`wp-content/plugins`. It was built with `npm ci && npm run build`, Composer's production packages
(`--no-scripts`), and a copy of the plugin folder's `vendor-prefixed/`, so live Stage 1 edits in the plugin
folder could not leak in (the 1.4.0 run was disturbed by them). Re-seeded with `wp publiclms seed --courses=10`;
Polylang with English, Arabic (right to left) and Japanese, set up as in the 1.4.0 run. The worktree was removed
afterwards and the env pointed back at the plugin folder.

| Check | Result |
|---|---|
| Primitives in the theme | On the lesson, quiz, assignment, checkout, order view, course page and dashboard sections, every card, panel, notice, badge, progress bar, tab strip, table, field and empty state resolves to the theme's tokens and radii (see "UI primitives" under B). No uppercase or letter-spacing on plugin text. Stat tiles don't appear on any learner page yet |
| Dashboard sections (A6) | `/my-learning/`, `/my-learning/completed/`, `/quiz-results/`, `/certificates/` and `/orders/` each answer 200 with only the open section rendered; on the Arabic and Japanese dashboard pages the links use `?section=`. By keyboard, a section link loads through the router without a reload, updates the URL and `aria-current`, and focus lands on the section's `h2` (`tabindex="-1"`, no ring). On phones the strip sticks to the top and scrolls sideways with the current section in view, from the right in Arabic; the page itself never scrolls sideways. Data tables stack into labelled rows under 600px. The theme's `plms-dashboard` template wraps it unchanged; the dashboard's look is left to the redesign |
| Focus | Mark complete keeps focus, quiz Start moves to "Questions", Hand in lands on "Your hand-in". Enrol still drops focus to `<body>` (finding 12) |
| Accessibility | axe (WCAG 2.2 AA and best practices) on 19 views at 1280 and 375 px, as a visitor and the learner, in English, Arabic and Japanese, then 7 again in the Dark variation: clean except the Certificates section's empty column header (finding 15). Keyboard pass clean on 12 pages at both widths |
| RTL | On Arabic pages every stylesheet is its `-rtl.css` copy, `build/ui/style-index-rtl.css` included (5 of 5 on the dashboard, 10 of 10 on the quiz); none on English pages |
| Lighthouse budgets | All pass against 97352aa: performance 98–99, accessibility 100, LCP 1.7–2.2 s, CLS 0, at most 50 KB script and 11.5 KB CSS per page |
| Open findings | 12 (focus after Enrol), 13 (order view "Price" header) and 14 (dashboard card titles at the theme's `h3` size) are unchanged at 97352aa; 15 and 16 are new |

## Phase 2 fix batch rerun (contract 1.4.0)

**2026-11-05, Public LMS 8d055b6, on the theme's own wp-env (8930, WordPress 7.1.4)** with the plugin folder as
the plugin session built it (`vendor-prefixed/` and `build/` already there). Re-seeded with `wp publiclms seed
--courses=10` (the global cast below, a paid course on sale, coupon `WELCOME10`, a checkout page). Polylang 3.9.1
with English, Arabic (`ar`, the real core language pack, right to left) and Japanese (`ja`); Climate Science
for Everyone and all its steps in Arabic, the paid Introduction to Python Programming in Japanese.

**Caveat.** During the run the plugin folder also held a large uncommitted change on top of 8d055b6 (41 files:
a shared UI layer, `src/interactivity/lib/focus.js`, new checkout and order view classes), and the order view's
markup changed while I tested. Results below were taken on that folder; each new finding was then checked
against the committed source of 8d055b6 with `git show`, read only.

**Logins (seed password, documented in the plugin's CONTRIBUTING):** learners `learner` (ليلى حداد, holds the
Arabic-script certificate), `learner.sharma` (प्रिया शर्मा), `learner.fernandez` (Lucía Fernández),
`learner.sato` (佐藤 健), `learner.kim` (김지우), `learner.walsh` (Liam Walsh); instructors `instructor`
(Amara Okafor), `instructor.wang` (王芳), `instructor.ivanov` (Дмитрий Иванов). Earlier sections of this file
mention the phase 1 cast (`sita.gurung`, `anita.shrestha`), which the seed no longer creates.

| Check | Result |
|---|---|
| Fix 4, RTL progress bars | Arabic course and dashboard: every partial bar (13%, 25%) fills from the right edge (0px from the inline start). With core's inline limit at 0, all theme and plugin sheets on Arabic pages are `-rtl.css` (8 of 8 on the course, 5 of 5 on the dashboard, including `tokens-rtl.css` and the blocks'), none on English pages |
| Fix 5, counts under Polylang | The learner's dashboard in English, Arabic and Japanese shows the same counts for every course in every language ("1 of 8 steps · 13%" for the Arabic course, "8 of 8 · 100%" for Bookkeeping) |
| Fix 6, editor warning | Editor load with `debug.log` cleared: nothing logged |
| Fixes 7 and 10, focus | By keyboard on the Arabic course as the learner: Mark complete keeps focus on its button ("Completed"); quiz Start moves focus to "Questions"; Hand in reloads onto `#publiclms-handin-…` with focus on "Your hand-in". Enrol still loses focus (finding 12) |
| Fix 9, heading sizes | "Lesson files" `has-lg-font-size` (20px); quiz "Questions" and "Your result", assignment "Your hand-in" and "Hand in again", checkout "Your order" `has-xl-font-size` (24px); dashboard greeting `has-2-xl-font-size` (30px). The theme's two `styles.blocks` overrides were removed with no change. The dashboard's course-card titles still take the theme's `h3` size (finding 14) |
| Fix 10, B1 pair | `warning` on `surface` is in B1 at 1.4.0; the theme's contrast check has covered it since 1.3.0 (4.69:1 or better) |
| Fix 11, course query | Related courses leave out the current course and put shared-subject courses first (Bookkeeping → Personal Finance Fundamentals first); on the Arabic and Japanese courses, the only course in their language, the row is empty instead of listing the course itself. A test grid with `publiclmsHideEnrolled` leaves out the learner's three courses |
| Certificates | The learner's certificate from the Arabic dashboard (`/wp-json/publiclms/v1/certificates/{id}`, `application/pdf`): "ليلى حداد" is joined and right to left in Noto Sans Arabic Bold; the rest in DejaVu |
| Checkout (`publiclms/checkout`, 1.4.0) | On its page with the theme's default page template: order summary on a `surface` card with the total at `lg`, coupon field and Apply button, "Your details" for guests, payment methods and Place order, all from tokens; `WELCOME10` gives "Discount −$3.90, Total $35.10"; the order view shows the on-hold notice with a `warning` start border on `surface`. The theme adds no styles for it beyond the generic `accent-color` rule. One plugin detail: finding 13 |
| Paid enrol state (`is-state-paid`) | Enrol card and hero both read "Buy for $39" and link to the checkout page; course cards show the sale price |
| Dashboard Orders tab | Order number linking to the order, date, courses, total, status; same table style as the other tabs |
| Prices | Locale-formatted prices never overflow or clip, on the course page and the archive cards at 1280 and 375 px: Arabic "‏999.50 €", Persian "‎€۹۹۹٫۵۰", Egyptian Arabic "‏٩٩٩٫٥٠ €", Bengali "৯৯৯.৫০€", Marathi "€९९९.५०", German "999,50 €", Japanese "€39" (tested with a temporary locale override in the env) |
| Accessibility | axe clean on the paid course (visitor, Arabic and Japanese), checkout (visitor and learner), order view, dashboard with the Orders tab open, Arabic course and dashboard, and again in the Dark variation. Keyboard pass clean on checkout (learner at 1280, guest at 375), order view and dashboard |

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

**Status:** 1 to 3 are fixed (commit 40f9aed) and checked in the theme: the filled next-lesson link
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

Numbering continues from the 1.2.0 run above. **Status at 8d055b6 (rechecked by the theme, see "Phase 2 fix
batch rerun"):** 4 to 11 are fixed: 4 in `f664c4c`, 5 in `6920b55`, 6 in `c713cc3`, 7 and 10 (focus) in `d7c35a7`,
8 in `529a160` (the zip is attached to published releases; none is published yet, so the Playground link still
waits), 9 and 10 (B1) in `d24dba7`, 11 in `af30cba`. **Status at 5c0e6b0 (contract 1.6.0):** 12 to 16 are fixed
(12 in `47296eb`, 13 in `ca7ee11`, 14 in `f7c15f1` and `d725d7e`, 15 in `30b79b7`, 16 in `0024942`); **17 to 23
below are new and open.**

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
   English, Arabic and Japanese on 0.3.0 at 7d72e4b, where every dashboard, English included, shows the courses of
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
    attribute, as both the theme's `hidden-related-courses` and the plugin's own `course-grid` do. Logged on 7d72e4b:
    the context keys are `perPage … inherit, publiclmsRelated` with no `namespace`, and the vars come back without
    `post__in`. So related courses are just the newest courses: on an Arabic or Japanese course, the only course in
    that language, "You might also like" lists the course itself, and the English row is right only because
    Bookkeeping is not among the three newest. The phase 1 check that the current course is left out was this
    coincidence. Suggested fix: read the namespace from the Query block (for example keep it from
    `render_block_data` for `core/query` blocks in a static, or check `$block->context['query']` for the
    `publiclms*` keys alone), and add an e2e check with the current course among the newest. The theme keeps
    the contract's markup and does not work around it.
12. **Keyboard focus is lost after Enrol (accessibility, medium).** Found in the 1.4.0 rerun and checked in the
    source of 8d055b6. Tab to "Enrol for free" and press Enter: the request succeeds and the status line announces
    "You are enrolled. Your first lesson is ready.", but `actions.enroll` sets `context.enrolled`, which hides the
    form (`data-wp-bind--hidden="context.enrolled"`) while its button has focus, so focus falls to `<body>` and the
    next Tab starts from the top of the page. Fixes 7 and 10 covered Mark complete, quiz Start and Hand in.
    Suggested fix: once enrolled, move focus to the new "Start learning" link (or the status message), as the
    quiz runner and the hand-in do.
13. **Order view: the "Price" header doesn't line up with the amounts (design, low).** In 8d055b6's
    `src/blocks/checkout/style.scss`, the order table's headers are `text-align: start` while the amounts are
    `end`, so "Price" sits at the start of the column and the prices at its end. Suggested fix: align the price
    column's header to `end` too.
14. **Dashboard course-card titles lose their size to the theme's `h3` (design, low; follow-up to 9).** In 8d055b6
    the card title is `<h3 class="wp-block-publiclms-student-dashboard__title">` with no preset class, while the
    plugin asks for `--publiclms-font-size-lg` at zero specificity; a block theme's `h3` element size wins (30px on
    CampusInterface), so long course names wrap onto four lines in a dashboard card. Suggested fix: add
    `has-lg-font-size`, as finding 9 did for the plugin's `h2` headings.
15. **Certificates section: the download column has an empty header (accessibility, low).** Found in the 1.5.0
    rerun at 97352aa. The table's fourth `th scope="col"` has no text, so axe reports `empty-table-header` on
    `/my-learning/certificates/`, and under 600px, where rows stack and each cell is labelled from its column, the
    download link's cell gets no label. In 1.4.0 the column was headed "Download". Suggested fix: give the header
    text (visually hidden if the design wants it blank), as the Orders and Quiz results tables do.
16. **Tab links take the theme's link colour and underline (design, low; B7).** The tabs primitive sets
    `color: inherit` and `text-decoration: none` on `.publiclms-tabs__tab` inside `:where()`. A block theme's
    global link style (`a:where(:not(.wp-element-button))`, specificity 0,0,1) beats it, so on CampusInterface every
    section link in the dashboard strip is primary and underlined, and the current one gets both the text underline
    and the 3px bar. The same zero-specificity pattern as findings 1 and 9. Suggested fix: give the tab link's
    colour and decoration class specificity, for example `.publiclms-tabs .publiclms-tabs__tab`, as finding 1's fix
    did; a theme can still restyle it with one class rule.

17. **Visitors on the full-width dashboard get a bare page (accessibility and usability, medium).** Logged out,
    `plms-dashboard-app` renders only `publiclms/student-dashboard`, whose `Shell::render()` returns just the
    "Log in to see your courses and progress" notice and a Log in button for visitors. The page then has no site
    header, footer or navigation, no `main` landmark and no `h1`: axe reports `landmark-one-main`,
    `page-has-heading-one` and `region` at both widths. Anyone who follows a "My learning" menu link while logged
    out lands there, and there is no way back to the site other than the browser's Back. With the theme's old
    `plms-dashboard` the same visitor got the minimal header, the page title as `h1` and the footer. Suggested
    fix: in the app layout, render the logged-out notice inside the frame (`main`, an `h1` such as the page
    title, the brand and "Back to site"), or show the log-in form there.
18. **The review star picker: no visible focus, and empty stars too faint (accessibility, medium).** In
    `src/blocks/course-reviews/style.scss` each star is a `label` drawn with `mask`, and focus is shown as
    `input:focus-visible + label { outline: … }`. The mask clips everything the label paints outside its box,
    the outline included, so the focused star shows no ring (WCAG 2.4.7). Checked by Tab and arrows: the outline
    is computed (2px, `primary`) and invisible on screen. Before a rating is chosen the stars are `line` on the
    `surface` panel, about 1.2:1 on CampusInterface, below the 3:1 that WCAG 1.4.11 asks of a control's visible
    parts; B1 itself says `line` is decorative only. Suggested fix: draw the ring on a wrapper or with a pseudo-element
    outside the masked box (for example a `::before` star and the outline on the label itself), and draw empty
    stars in `contrast` (an outline star) or `muted`.
19. **Course page section headings come in two sizes (design, low).** On the plugin's `single-plms_course` and the
    theme's, "Curriculum" and "Your instructor" are core Headings from the `course-curriculum` and
    `course-instructor` patterns, with no size, so they take the theme's `h2` (40px on CampusInterface). The new
    blocks' headings, "Announcements" and "Reviews", carry `has-xl-font-size` (24px). Four sibling sections, two
    sizes. Suggested fix: one rule for both; for example give the two pattern headings `"fontSize":"xl"` too, or
    drop the class from the blocks' `h2` so they follow the theme.
20. **The Q&A title says "lesson" on quizzes and assignments (copy, low).** `src/blocks/course-qa/render.php`
    uses "Questions about this lesson" whenever there is an item, so a quiz page reads "Questions about this
    lesson". Suggested fix: by post type, "Questions about this quiz" and "Questions about this assignment", or
    one neutral string such as "Questions about this step".
21. **The lesson shifts once the curriculum toggle's script runs (performance, low).** The phones-only "Course
    content" button is hidden until the plugin's deferred script sets `html.publiclms-curriculum-drawer`, which
    happens after the first paint (about 455 ms in Lighthouse's mobile run). The button then takes a row above
    the lesson title, moving everything below it 51px. Contract item 3 lets a theme hide its own outline under
    the same class, and CampusInterface does, so its Details goes at the same moment (79px up). Lighthouse
    measures CLS 0.038 on the theme's lesson, 0.0405 with the theme's rule turned off, and 0 at 97352aa; the
    budget is 0.05. Suggested fix: decide visibility before the first paint, either with CSS
    (`@media (scripting: enabled)`, supported by current browsers) or a one-line inline script in the head that
    sets the class. The theme would then key its rule to the same signal.
22. **The dashboard's stats wrap with a stray rule on phones (design, low).** The ledger draws a start rule and
    padding on every tile after the first. At 375px the four tiles wrap into two rows, so the third tile
    (the first of the second row) keeps the rule and the indent: "1 Certificates" sits 20px in, with a line at the
    left edge. Suggested fix: on the wrapping width, draw the rules with a grid and `gap`, or drop the start rule
    on the first tile of each row.
23. **B8's claim about the `muted` fallback (contract wording, low).** B8 says the fallback,
    `color-mix(in srgb, contrast 68%, base)`, is "6:1 or better with CampusInterface's palettes". Computed from
    the palettes it is 5.0 to 6.1:1 on `base` and 4.66 to 5.65:1 on `surface` (Kids is lowest; Dark is higher). It
    passes, but the sentence should say 4.5:1 or give the figures. CampusInterface now defines `muted`, so the
    fallback does not apply to it.
