#!/usr/bin/env bash
#
# Prepares the wp-env site that Lighthouse CI measures (lighthouserc.json):
# pretty permalinks, the theme, Public LMS demo data (with the `/my-learning/`
# student dashboard and the `learner` account) and an "Academy home" page
# built from the theme's full-page pattern.
#
# Run from the theme folder after `npx @wordpress/env@12 start`, with Public
# LMS mounted (see .github/workflows/lighthouse.yml).

set -euo pipefail

wp() {
	npx --yes @wordpress/env@12 run cli wp "$@"
}

wp theme activate campusinterface
wp plugin activate public-lms
wp option update blogname 'Lakeside Academy'
wp rewrite structure '/%postname%/'
wp publiclms seed --courses=10
# The dashboard is measured logged in as `learner` (bin/lighthouse-learner-cookie.sh).
# Core's toolbar is the same on every page for logged-in users and weighs more
# than the dashboard itself (dashicons and admin-bar CSS, about 42 KB), so it is
# turned off for that account: the budget measures the theme and the dashboard.
wp user meta update learner show_admin_bar_front false
wp post create \
	--post_type=page \
	--post_status=publish \
	--post_title='Academy home' \
	--post_name=academy-home \
	--page_template=page-no-title \
	--post_content='<!-- wp:pattern {"slug":"campusinterface/page-academy-home"} /-->'
wp rewrite flush
