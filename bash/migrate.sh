#!/bin/sh

# Go to root path site
cd /var/www/html/barter || exit

/usr/bin/php8.1 artisan migrate

echo "migrate complete"
