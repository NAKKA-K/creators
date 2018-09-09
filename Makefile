.DEFAULT_GOAL := help

.PHONY: help run migrate

help: Makefile
	@cat Makefile

run:
	php artisan serve

migrate:
	php artisan migrate
