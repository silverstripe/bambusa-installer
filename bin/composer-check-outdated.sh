#!/usr/bin/env bash

# This script tries to identify when new releases of dependencies are available
# and triggers a notification to a Slack channel passed as a Slack webhook in
# the first argument of the script

set -e

SLACK_WEBHOOK_URL="$1"

BIN_SCRIPTS_BASE_DIR=$(dirname $(readlink -f "$0"))
APPLICATION_BASE_DIR=$(dirname "$BIN_SCRIPTS_BASE_DIR")

rm -rf "$APPLICATION_BASE_DIR/vendor";
cd $APPLICATION_BASE_DIR;

composer update --ignore-platform-reqs --prefer-dist --no-dev --no-interaction --no-progress --no-suggest --optimize-autoloader --verbose --profile

echo "Sending the Slack message: $(composer outdated -D --format=json | $BIN_SCRIPTS_BASE_DIR/create-slack-message.php)";

composer outdated -D --format=json | $BIN_SCRIPTS_BASE_DIR/create-slack-message.php |  curl -X POST -H 'Content-type: application/json' --data @- $SLACK_WEBHOOK_URL
