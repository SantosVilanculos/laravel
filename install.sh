#!/usr/bin/bash

cp ./.env.example ./.env

composer install --no-interaction

if [ -f ./composer.lock ]; then
    php artisan key:generate
    php artisan storage:link

    php artisan ide-helper:generate
    php artisan ide-helper:models -N

    touch ./database/database.sqlite
    php artisan migrate:fresh --seed || php artisan migrate --seed
fi

pnpm install

if [ -f ./pnpm-lock.yaml ]; then
    pnpm run build
fi
