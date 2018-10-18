.DEFAULT_GOAL := help

.PHONY: help run migrate migrate/fresh c routes test

help: Makefile
	@-bat Makefile || \
	cat Makefile

run:
	php artisan serve

migrate:
	php artisan migrate

migrate/fresh:
	php artisan migrate:fresh --seed

c:
	php artisan tinker

routes:
	php artisan route:list

test: tests/
	vendor/bin/phpunit tests/
