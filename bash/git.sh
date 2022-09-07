#!/bin/sh

# Go to root path site
cd /var/www/html/barter || exit

# Turn on maintenance mode
#/usr/bin/php8.1 artisan down

# Reset local changes
git reset --hard HEAD

# Pull the latest changes from the git repository
git pull origin dev

# Turn off maintenance mode
/usr/bin/php8.1 artisan up

echo "git pull complete"
