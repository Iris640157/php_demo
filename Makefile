# Makefile for PHP Docker Project
WEBBASH = docker compose exec app bash
DBBASH = docker compose exec db bash

define HELP
\n
command             |  definition
====================================================================================
>> build-no-cache   |  Builds the docker container without systems cache.
>> build            |  Builds the docker container with existing cache.
>> clean            |  Removes all the temp files, stops the docker and removes the docker images as well.
>> db-bash          |  Enter the DB docker Bash.
>> logs             |  Fetch the logs of a container.
>> start            |  Starts the docker container.
>> stop             |  Stops the docker container.
>> web-bash         |  Enter the Web docker Bash.
\n
endef
export HELP

# Default target
.DEFAULT_GOAL := help

# Colors
GREEN := \033[0;32m
NC := \033[0m

# --- HELP ---
help:
	@echo "$$HELP"
	@echo -e "${GREEN}Available commands:${NC}"
	@echo -e "  make start        -> Build and start containers"
	@echo -e "  make stop      -> Stop and remove containers"
	@echo -e "  make rebuild   -> Rebuild containers from scratch"
	@echo -e "  make logs      -> Show logs for all containers"
	@echo -e "  make php       -> Enter the PHP container shell"
	@echo -e "  make db        -> Enter the MySQL container shell"
	@echo -e "  make clean     -> Remove all containers, networks, and volumes"

# --- Build and start ---
start:
	@docker compose up -d --build
	@echo -e "${GREEN}Containers are up!${NC}"
	@echo -e "PHP: http://localhost:8080"
	@echo -e "phpMyAdmin: http://localhost:8081"

# --- Stop and remove containers ---
stop:
	@docker compose down
	@echo -e "${GREEN}Containers stopped and removed!${NC}"


build-no-cache:
	@docker compose build --no-cache

.PHONY: build
build:
	@docker compose build

# --- Rebuild containers ---
rebuild:
	@docker compose down -v
	@docker compose up -d --build
	@echo -e "${GREEN}Rebuilt all containers!${NC}"

# --- Show logs ---
logs:
	@docker compose logs -f

# --- Enter PHP container ---
php:
	docker exec -it php_app bash

web-bash:
	@$(WEBBASH)

# --- Enter MySQL container ---
db:
	docker exec -it php_mysql bash

db-bash:
	@$(DBBASH)

# --- Remove everything (containers + volumes) ---
clean:
	@docker compose down -v --rmi all
	@echo -e "${GREEN}Cleaned all containers, networks, and volumes!${NC}"