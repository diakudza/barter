#!/bin/sh

/usr/bin/mysqldump --complete-insert --extended-insert --skip-add-locks --disable-keys --add-drop-table --skip-lock-tables --user=root --password=password --host=mysql barter > storage/app/public/backup/dump.sql

echo "mysqldump complete"
