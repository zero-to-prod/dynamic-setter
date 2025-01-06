#!/usr/bin/env bash
set -e

services=("8.4" "8.3" "8.2" "8.1" "8.0" "7.4" "7.3" "7.2" "7.1")

for service in "${services[@]}"; do
  docker compose run --rm "php${service}composer" composer update --no-cache

  if ! docker compose run --rm "php${service}" vendor/bin/phpunit --configuration docker/php/"${service}"/phpunit.xml; then
    exit 1
  fi
done