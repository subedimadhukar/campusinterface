#!/usr/bin/env bash
#
# Prints a Cookie header, as the JSON Lighthouse takes for `extraHeaders`, that
# logs in the `learner` account `bin/lighthouse-seed.sh` creates. Lighthouse CI
# measures the student dashboard with it (.github/workflows/lighthouse.yml);
# every other page is measured as a visitor. The session lasts an hour.
#
# Run from the theme folder after `bin/lighthouse-seed.sh`.

set -euo pipefail

npx --yes @wordpress/env@12 run cli wp eval '
$campusinterface_user    = get_user_by( "login", "learner" );
$campusinterface_expires = time() + HOUR_IN_SECONDS;
$campusinterface_token   = WP_Session_Tokens::get_instance( $campusinterface_user->ID )->create( $campusinterface_expires );
echo wp_json_encode( array( "Cookie" => LOGGED_IN_COOKIE . "=" . wp_generate_auth_cookie( $campusinterface_user->ID, $campusinterface_expires, "logged_in", $campusinterface_token ) ) );
' 2> /dev/null
