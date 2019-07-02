#!/usr/bin/env bash

set -e

if [[ $# < 3 ]]; then
  echo "Usage: $0 login password image";
  echo "";
  echo "Login and password are for the docker registry (docker hub most likely). Image should be fully qualified (e.g. silverstripe/bambusa-installer)";
  exit 1;
fi

DOCKER_SCRIPTS_BASE_DIR=$(dirname $(readlink -f "$0"))
APPLICATION_BASE_DIR=$(dirname "$DOCKER_SCRIPTS_BASE_DIR")

rm -rf "$APPLICATION_BASE_DIR/vendor";
cd $APPLICATION_BASE_DIR;
composer update --ignore-platform-reqs --prefer-dist --no-dev --no-interaction --no-progress --no-suggest --optimize-autoloader --verbose --profile
docker build --no-cache -t "bambusa:new" -f "$DOCKER_SCRIPTS_BASE_DIR/Dockerfile" "$APPLICATION_BASE_DIR"

VERSION=$(date +%s)
TARGET_IMAGE="$3"

echo $2 | docker login --password-stdin -u $1

docker tag "bambusa:new" "$TARGET_IMAGE:$VERSION"
docker tag "bambusa:new" "$TARGET_IMAGE:latest"

echo "Publishing $TARGET_IMAGE:$VERSION"
docker push "$TARGET_IMAGE:$VERSION"

echo "Publishing $TARGET_IMAGE:latest"
docker push "$TARGET_IMAGE:latest"
