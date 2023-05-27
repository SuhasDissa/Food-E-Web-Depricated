#!/bin/bash -i

docker-compose build app
docker-compose up -d
echo "APP_NAME=Food-E
APP_KEY=
DB_CONNECTION=sqlite" > .env
docker exec food_e composer install --optimize-autoloader --no-dev
docker exec food_e npm install
docker exec food_e npm run build

docker exec food_e php artisan key:generate
docker exec food_e php artisan config:cache
docker exec food_e php artisan route:cache
docker exec food_e php artisan view:cache
docker exec food_e php artisan migrate --force