=== CampusInterface ===
Contributors: wpinterface
Requires at least: 6.7
Tested up to: 7.1
Requires PHP: 7.4
Stable tag: 0.2.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A full-site-editing block theme for schools, academies, online course creators and training companies.

== Description ==

CampusInterface is a block theme for education websites. Every colour, font size, space and radius is a theme.json token you can change in Styles, with fluid type, responsive styles for phones and tablets, five colour variations (Campus, Studio, Kids, Corporate and Dark) and three type sets (Editorial, Modern and System) that mix freely. Every palette passes WCAG 2.2 AA contrast on the colour pairs the theme and Public LMS use.

CampusInterface pairs with the free Public LMS plugin: install it to add courses, lessons, quizzes and certificates, and the theme's course patterns fill with your courses. Without the plugin, CampusInterface is a clean, fast school or academy website.

* No jQuery and no theme JavaScript
* Self-hosted variable fonts, nothing loaded from third-party servers
* 38 patterns: heroes, course grids and a scroll-snap carousel, pricing, instructors, testimonials, events, FAQ, headers, footers and two full pages
* Templates for posts, pages, archives, search and 404
* Right-to-left ready: layouts, card styles, the quote bar and the carousel mirror in Arabic, Hebrew and other RTL languages

== Accessibility ==

CampusInterface is built to WCAG 2.2 level AA and carries the accessibility-ready tag:

* A "Skip to content" link is the first focusable element on every template (WordPress adds it for block themes).
* Header, main, footer and every navigation landmark are named; footer menus have their own labels.
* Every link, button, form field, disclosure (Details block), menu toggle and the course carousel shows a visible focus outline.
* Links in text are underlined. Text and controls meet AA contrast in all five colour variations, which is checked automatically for every palette.
* Images that carry meaning have alternative text; purely decorative icons have empty alternative text.
* The theme has no animations, no auto-playing media and no JavaScript. It honours "reduce motion" for anything added later.
* Layouts reflow down to 320px wide and text resizes to 200%.
* The Accessibility statement pattern gives site owners a starting point for their own statement.

Found a barrier? Please report it at https://github.com/wpinterface/campusinterface/issues.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click Add New Theme.
2. Search for CampusInterface, click Install, then Activate.
3. Go to Appearance > Editor to customise templates, patterns and styles.
4. Optional: install the Public LMS plugin for courses.

== Frequently Asked Questions ==

= Do I need the Public LMS plugin? =

No. The theme works on its own. The course grid pattern shows courses only when Public LMS is active.

= Does the theme work with other LMS plugins? =

Its patterns and styles do. Course template overrides are built for Public LMS.

= Can I run a multilingual site? =

Yes. Every text in the templates, parts and patterns is translatable, the course catalogue and privacy policy links follow the visitor's language, and layouts make room for longer translations. Menus you build with the Navigation block are your own content: create one per language with your translation plugin.

== Changelog ==

= 0.3.0 =
* Right-to-left: the quote bar now sits on the reading side; Arabic-script languages keep their letter joins in Safari.
* Multilingual: long translated words and figures wrap inside their column; footer privacy links point at the privacy page of the visitor's language.

= 0.2.0 =
* 49 patterns (38 in the inserter): three heroes, course grids in 3 and 4 columns and a scroll-snap carousel, subjects, statistics, features, steps, instructors, testimonials, pricing in 2 and 3 columns, FAQ, two call-to-action bands, events, logos, newsletter, blog cards, log-in panel, promo bar, accessibility statement, five headers, three footers and two full pages.
* Templates for Public LMS courses, course archives, lessons, quizzes and the student and instructor dashboards, plus landing and split log-in page templates. Tested with Public LMS contract 1.2.0; quiz, reviews and instructor dashboard areas show a fallback until the plugin ships them.
* Ten template parts, including a lesson bar, a course sidebar and a WordPress 7.0 navigation overlay.
* Colour variations Studio, Kids, Corporate and Dark; System type set; section styles for bands and cards; five Query Loop card styles.
* Accessibility-ready: focus styles for every control, reduced-motion support, accessibility statement pattern.
* Fix: 2X, 3X and 4X large font sizes now apply.

= 0.1.0 =
* Initial scaffold: theme.json v3 design tokens, two bundled variable fonts, eight templates, header and footer parts, eight patterns, two colour and two typography variations.

== Copyright ==

CampusInterface WordPress Theme, (C) 2026 WPInterface.
CampusInterface is distributed under the terms of the GNU GPL.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

== Resources ==

* Fraunces (variable font, Latin subset, WOFF2)
  Copyright 2018 The Fraunces Project Authors (https://github.com/undercasetype/Fraunces)
  License: SIL Open Font License, Version 1.1, https://openfontlicense.org/
  Source: https://github.com/undercasetype/Fraunces, file served by Google Fonts (https://fonts.google.com/specimen/Fraunces)
  Used: assets/fonts/fraunces/Fraunces-Variable.woff2; licence text in assets/fonts/fraunces/OFL.txt

* Figtree (variable font, roman and italic, Latin subset, WOFF2)
  Copyright 2022 The Figtree Project Authors (https://github.com/erikdkennedy/figtree)
  License: SIL Open Font License, Version 1.1, https://openfontlicense.org/
  Source: https://github.com/erikdkennedy/figtree, files served by Google Fonts (https://fonts.google.com/specimen/Figtree)
  Used: assets/fonts/figtree/Figtree-Variable.woff2 and Figtree-Italic-Variable.woff2; licence text in assets/fonts/figtree/OFL.txt

* Illustrations, portraits, icons and logos in assets/images/ (SVG), and screenshot.png
  Created for CampusInterface by WPInterface, 2026. No stock photography is used.
  The people shown in the portrait illustrations and the organisations in the logo strip are fictional.
  License: GPLv2 or later, https://www.gnu.org/licenses/gpl-2.0.html
  Files: learning-illustration.svg, coaching-session.svg, course-data-analysis.svg, course-javascript.svg,
  course-public-speaking.svg, course-sql.svg, course-ux-design.svg, course-web-development.svg,
  instructor-asha-gurung.svg, instructor-daniel-okafor.svg, instructor-elena-ortiz.svg, instructor-marcus-bell.svg,
  learner-grace-mwangi.svg, learner-sanjana-shrestha.svg, learner-tom-whitaker.svg,
  icon-business.svg, icon-career.svg, icon-certificate.svg, icon-clock.svg, icon-code.svg, icon-data.svg,
  icon-design.svg, icon-mentor.svg, icon-mobile.svg, icon-speaking.svg,
  logo-bluegate-labs.svg, logo-harbor-and-pine.svg, logo-meridian-trust.svg, logo-northfield-college.svg,
  logo-openfield-school.svg
