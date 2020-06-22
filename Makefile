init: build up composer-install migarte
restart: down up

up:
	docker-compose up

down:
	docker-compose down

build:
	docker-compose build

composer-install:
	docker-compose run --rm store-php-cli composer install --ignore-platform-reqs

composer-update:
	docker-compose run --rm store-php-cli composer install --ignore-platform-reqs

migrate:
	docker-compose run --rm store-php-cli php artisan migrate

docker-compose run --rm store-php-cli php artisan vendor:publish
