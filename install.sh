#!/usr/bin/bash

cp ./.env.example ./.env

composer install

php artisan key:generate
php artisan storage:link
php artisan ide-helper:generate
php artisan ide-helper:models -N

pnpm install
pnpm run build

touch ./database/database.sqlite
php artisan migrate:fresh --seed || php artisan migrate --seed
