#!/usr/bin/bash

cp ./.env.example ./.env

composer install --no-interaction

if [ -f ./composer.lock ]; then
    php artisan key:generate
    php artisan storage:link

    php artisan ide-helper:generate
    php artisan ide-helper:models -N
    php artisan vendor:publish --tag=log-viewer-assets

    touch ./database/database.sqlite
    php artisan migrate:fresh --seed || php artisan migrate --seed --graceful
fi

pnpm install

if [ -f ./pnpm-lock.yaml ]; then
    pnpm run build
fi
