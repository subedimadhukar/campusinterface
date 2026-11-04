#!/usr/bin/env bash
#
# Prepares the wp-env site that Lighthouse CI measures (lighthouserc.json):
# pretty permalinks, the theme, Public LMS demo data and an "Academy home"
# page built from the theme's full-page pattern.
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
wp post create \
	--post_type=page \
	--post_status=publish \
	--post_title='Academy home' \
	--post_name=academy-home \
	--page_template=page-no-title \
	--post_content='<!-- wp:pattern {"slug":"campusinterface/page-academy-home"} /-->'
wp rewrite flush
