#!/bin/sh

cd /var/www/html/barter || exit

npm run build;

echo "npm build complete"
