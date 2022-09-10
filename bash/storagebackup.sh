#!/bin/sh

tar -czvf storage/app/public/backup/backupstorage.tar.gz storage/app/public 1>/dev/null

echo "backup complete"
