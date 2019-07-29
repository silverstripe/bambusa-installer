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
VERSION=$(date +%s)
TARGET_IMAGE="$3"

rm -rf "$APPLICATION_BASE_DIR/vendor";
cd $APPLICATION_BASE_DIR;

composer update --ignore-platform-reqs --prefer-dist --no-dev --no-interaction --no-progress --no-suggest --optimize-autoloader --verbose --profile
composer show # logging for CI

docker build \
  --no-cache \
  --build-arg "travis_commit_id=$TRAVIS_COMMIT" \
  --build-arg "travis_build_num=$TRAVIS_BUILD_NUMBER" \
  --build-arg "travis_build_url=$TRAVIS_BUILD_WEB_URL" \
  --build-arg "travis_job_num=$TRAVIS_JOB_NUMBER" \
  --build-arg "travis_job_url=$TRAVIS_JOB_WEB_URL" \
  --build-arg "travis_docker_image_tag=$VERSION" \
  -t "bambusa:new" \
  -f "$DOCKER_SCRIPTS_BASE_DIR/Dockerfile"\
  "$APPLICATION_BASE_DIR"

echo $2 | docker login --password-stdin -u $1

docker tag "bambusa:new" "$TARGET_IMAGE:$VERSION"
docker tag "bambusa:new" "$TARGET_IMAGE:latest"

echo "Publishing $TARGET_IMAGE:$VERSION"
docker push "$TARGET_IMAGE:$VERSION"

echo "Publishing $TARGET_IMAGE:latest"
docker push "$TARGET_IMAGE:latest"
