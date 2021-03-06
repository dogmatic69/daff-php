#!/bin/bash

# quick script to pull from main daff repository

set -e

# assume we are at the same level as main daff repository
src=$PWD/../daff/php_bin/
dest=gen

if [ ! -e $src/lib/coopy/Coopy.class.php ]; then
    echo "Cannot find source daff, stopping"
    exit 1
fi

for php in `cd $src; find . -iname "*.php"`; do
    mkdir -p `dirname $dest/$php`
    if [ ! -e $dest/$php ]; then
	echo "Add $php"
	cp $src/$php $dest/$php
	git add $dest/$php
    else
	cp $src/$php $dest/$php
    fi
done

for php in `cd $dest; find . -iname "*.php"`; do
    if [ ! -e $src/$php ]; then
	echo "Remove $php"
	git rm $dest/$php
    fi
done

# check version
version=`php gen/index.php version`
sed -i "s|\"version\"\: \".*\"|\"version\": \"$version\"|" composer.json
git show v$version || {
    git commit -m "$version" -a
    git tag -a "v$version" -m "$version"
}
