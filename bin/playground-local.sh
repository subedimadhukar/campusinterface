#!/usr/bin/env bash
#
# Runs blueprint.json in WordPress Playground on this machine, with the theme
# and Public LMS taken from local working copies instead of their GitHub URLs,
# so unpushed commits and an unreleased plugin can be tested.
#
# It zips this theme (git archive of HEAD) and a release-like copy of the
# plugin folder next to it (../../plugins/public-lms, which must be built with
# npm run build; production Composer packages are installed in the copy, the
# plugin folder itself is not touched), writes a copy of blueprint.json whose
# install steps point at those zips, and starts Playground on
# http://127.0.0.1:9400. Needs Node 20.18 or later and Composer.
#
# Usage: bin/playground-local.sh [path/to/public-lms]

set -euo pipefail

theme_dir="$(cd "$(dirname "$0")/.." && pwd)"
plugin_dir="$(cd "${1:-$theme_dir/../../plugins/public-lms}" && pwd)"
out="$theme_dir/build/playground"

for required in "$plugin_dir/build/blocks" "$plugin_dir/composer.lock"; do
	if [ ! -e "$required" ]; then
		echo "Public LMS is not built: $required is missing (run npm run build there)." >&2
		exit 1
	fi
done

rm -rf "$out"
mkdir -p "$out"

git -C "$theme_dir" archive --format=zip --prefix=campusinterface/ -o "$out/campusinterface.zip" HEAD
# A copy shaped like the release zip: no sources, tests or dev packages.
mkdir -p "$out/plugin"
rsync -a \
	--exclude .git --exclude node_modules --exclude vendor --exclude /src --exclude /tests \
	--exclude /artifacts --exclude '.wp-env*' --exclude .DS_Store \
	"$plugin_dir/" "$out/plugin/public-lms/"
composer install --working-dir="$out/plugin/public-lms" --no-dev --no-interaction --quiet --optimize-autoloader
(cd "$out/plugin" && zip -qr "$out/public-lms.zip" public-lms)

node -e '
const fs = require("fs");
const [src, dst] = process.argv.slice(1);
const bp = JSON.parse(fs.readFileSync(src, "utf8"));
for (const step of bp.steps) {
	if (step.step === "installPlugin") step.pluginData = { resource: "bundled", path: "/public-lms.zip" };
	if (step.step === "installTheme") step.themeData = { resource: "bundled", path: "/campusinterface.zip" };
}
fs.writeFileSync(dst, JSON.stringify(bp, null, "\t"));
' "$theme_dir/blueprint.json" "$out/blueprint.json"

exec npx --yes @wp-playground/cli@3.1.60 server \
	--blueprint="$out/blueprint.json" \
	--blueprint-may-read-adjacent-files \
	--port="${PLAYGROUND_PORT:-9400}"
