#!/usr/bin/env bash
#
# Prints a Cookie header, as the JSON Lighthouse takes for `extraHeaders`, that
# logs in one of the accounts `bin/lighthouse-seed.sh` creates: `learner` by
# default, or the login given as the first argument (`instructor`). Lighthouse
# CI measures the student dashboard and the Teaching dashboard with it
# (.github/workflows/lighthouse.yml); every other page is measured as a
# visitor. The session lasts an hour.
#
# Run from the theme folder after `bin/lighthouse-seed.sh`:
#   bin/lighthouse-cookie.sh             # learner
#   bin/lighthouse-cookie.sh instructor

set -euo pipefail

wp() {
	npx --yes @wordpress/env@12 run cli wp "$@" 2> /dev/null
}

user_id="$(wp user get "${1:-learner}" --field=ID | tr -d '[:space:]' || true)"
if [[ ! "$user_id" =~ ^[0-9]+$ ]]; then
	echo "No such user: ${1:-learner}" >&2
	exit 1
fi

wp eval "
\$campusinterface_expires = time() + HOUR_IN_SECONDS;
\$campusinterface_token   = WP_Session_Tokens::get_instance( $user_id )->create( \$campusinterface_expires );
echo wp_json_encode( array( 'Cookie' => LOGGED_IN_COOKIE . '=' . wp_generate_auth_cookie( $user_id, \$campusinterface_expires, 'logged_in', \$campusinterface_token ) ) );
"
