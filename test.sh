#!/usr/bin/env bash
set -e

PHP_VERSIONS=("8.4" "8.3" "8.2" "8.1" "8.0" "7.4" "7.3" "7.2" "7.1")

for version in "${PHP_VERSIONS[@]}"; do

  export PHP_COMPOSER="${version}"
  export PHP_VERSION="${version}"

  docker compose run --rm composer composer update --no-cache

  if ! docker compose run --rm php vendor/bin/phpunit --configuration "docker/php/${version}/phpunit.xml"
  then
    exit 1
  fi
done