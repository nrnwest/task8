##################
# Variables
##################

DOCKER_COMPOSE = docker-compose -f ./_docker/docker-compose.yml --env-file ./_docker/.env
DOCKER_COMPOSE_EXEC = exec -u www-data php-fpm

PRINT_SEPARATOR = "\n\n"
PRINT_WELCOME = Welcome: http://localhost:4441
PRINT_SWAGGER = Swagger: http://localhost:4441/api/documentation
PRINT_PHPMYADMIN = phpMyAdmin: http://localhost:4444

##################
# Docker compose
##################

build:
	${DOCKER_COMPOSE} build

start:
	${DOCKER_COMPOSE} start

stop:
	${DOCKER_COMPOSE} stop

up:
	${DOCKER_COMPOSE} up -d --remove-orphans

ps:
	${DOCKER_COMPOSE} ps

logs:
	${DOCKER_COMPOSE} logs -f

down:
	${DOCKER_COMPOSE} down -v --rmi=all --remove-orphans

restart:
	make stop start

net:
	docker network ls


##################
# App
##################

php:
	${DOCKER_COMPOSE} ${DOCKER_COMPOSE_EXEC}  bash

# all tests
test:
	${DOCKER_COMPOSE} ${DOCKER_COMPOSE_EXEC} php artisan test

composer:
	${DOCKER_COMPOSE} ${DOCKER_COMPOSE_EXEC} composer install

##################
# Database
##################

db_migrate:
	${DOCKER_COMPOSE} ${DOCKER_COMPOSE_EXEC} php artisan migrate

db_seed:
	${DOCKER_COMPOSE} ${DOCKER_COMPOSE_EXEC} php artisan db:seed

db_add:
	make db_migrate db_seed

#################
#  Deployment
#################
init:
	make build up composer pause db_add print

pause:
	sleep 10

print:
	@echo ${PRINT_SEPARATOR}
	@echo ${PRINT_WELCOME}
	@echo ${PRINT_SWAGGER}
	@echo ${PRINT_PHPMYADMIN}
	@echo ${PRINT_SEPARATOR}
