#!/bin/sh

if [ -f ./composer.json ]; then
	if [ ! -d "./vendor" ]; then
	  composer install
	fi

	php artisan serve --host=0.0.0.0 --port=80

else
	composer create-project --prefer-dist laravel/laravel new-project
fi
