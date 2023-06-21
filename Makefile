.RECIPEPREFIX +=
.DEFAULT_GOAL := help
PROJECT_NAME=jump
include .env

# mkcert "*.menu-maker.localhost" "menu-maker.localhost"

help:
	@echo "Welcome to $(PROJECT_NAME) IT Support, have you tried turning it off and on again?"

install:
	@composer install

migrate:
	@docker exec $(PROJECT_NAME)_php php artisan migrate

seed:
	@docker exec $(PROJECT_NAME)_php php artisan db:seed

fresh:
	@docker exec $(PROJECT_NAME)_php php artisan migrate:fresh

route-list:
	@docker exec $(PROJECT_NAME)_php php artisan route:list

artisan:
	@docker exec $(PROJECT_NAME)_php php artisan

queue:
	@docker exec $(PROJECT_NAME)_php php artisan queue:work

nginx:
	@docker exec -it $(PROJECT_NAME)_nginx /bin/sh

php:
	@docker exec -it $(PROJECT_NAME)_php /bin/sh

mysql:
	@docker exec -it $(PROJECT_NAME)_mysql /bin/sh

redis:
	@docker exec -it $(PROJECT_NAME)_redis /bin/sh

container:
	@docker container ps

up:
	@docker-compose up -d

down:
	@docker-compose down

reload:
	@docker-compose down && docker-compose up -d

pint:
	./vendor/bin/pint

test:
	./vendor/bin/phpunit

html:
	XDEBUG_MODE=coverage ./vendor/bin/phpunit --coverage-html coverage/
