#!/bin/sh

cd .. && /usr/bin/php8.1 /usr/local/bin/composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

echo "composer install complete"
