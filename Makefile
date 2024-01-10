BIN = ./vendor/bin
SAIL = $(BIN)/sail
ASSETS_BUILD = npm install && npm run dev;

# Docker --------------------------------------------------------------------- #
up:
	$(SAIL) up -d

down:
	$(SAIL) down

rebuild:
	make down;
	$(SAIL) build --no-cache;
	make restart;

restart:
	make down; make up;

asset:
	$(SAIL) artisan ui adminlte
	$(ASSETS_BUILD)

# App ------------------------------------------------------------------------ #
local-setup:
	cp .env.example .env
	composer install;
	make up;
	$(SAIL) artisan key:generate;
	$(SAIL) artisan storage:link;
	make asset
	make migrate;

migrate:
	$(SAIL) artisan migrate:fresh --seed;

clean:
	$(SAIL) artisan view:clear;
	$(SAIL) artisan config:clear;
	$(SAIL) artisan optimize:clear;
	$(SAIL) artisan route:clear;

test:
	$(SAIL) artisan migrate:fresh --seed --env=testing
	$(SAIL) artisan test;

ecs: ## Runs the ECS checker and fixes anything it can
	@$(SAIL) php $(BIN)/ecs --fix

php-stan:
	$(SAIL) php -d memory_limit=-1 $(BIN)/phpstan analyse;

php-md: ## Run the PHP mess detector
	$(SAIL) php $(BIN)/phpmd ./app text phpmd.xml

ci:
	make ecs
	make php-md
	make php-stan
sh:
	$(SAIL) bash
queue:
	$(SAIL) artisan queue:work;
