#!/bin/sh

/usr/bin/mysqldump --complete-insert --extended-insert --skip-add-locks --disable-keys --add-drop-table --skip-lock-tables --user=root --host=127.0.0.1 > storage/app/public/backup/dump.sql

echo "mysqldump complete"
