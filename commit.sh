#!/bin/sh
# if [ $# -ne 1 ]; then
#     echo "Usage: $0 comment"
#     exit 1
# fi

git add . -A
git commit -m "$1"
git push origin master

