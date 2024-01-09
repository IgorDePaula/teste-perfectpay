CONTAINER=app
all: help

docker-install: docker-build docker-up docker-composer-install docker-migrate docker-clear

docker-up: ## Inicia o container
	docker compose up -d

docker-down: ## Para e remove containers
	docker compose down

docker-bash: docker-up ## Inicia uma sessao bash
	docker exec -it $(CONTAINER) /bin/bash

docker-build: ## Constroi os containers
	docker compose build

docker-composer-install: docker-up ## Instala as dependencias do composer
	docker exec $(CONTAINER) composer install --no-interaction --no-scripts && chmod -R 777 storage && chmod -R 777 bootstrap &&  php artisan key:generate

docker-test: docker-up docker-clear ## Executa os testes da apicacao sem cobertura. Use a opcao 'FILTER' para rodar um teste especifico
ifdef FILTER
	docker exec -t $(CONTAINER) composer unit-test -- --filter="$(FILTER)"
else
	docker exec -t $(CONTAINER) composer unit-test
endif

docker-logs: docker-up ## Visualiza os logs do container
	docker compose logs --follow

docker-clear: docker-up ## Limpa os caches do laravel
	docker exec $(CONTAINER) /bin/bash -c "php artisan optimize:clear" && chmod -R 777 storage && chmod -R 777 bootstrap

docker-coverage-html: docker-up docker-clear ## Executa os testes com cobertura
	docker exec -t $(CONTAINER) composer test-coverage-html

docker-link: docker-up docker-clear ## Executa o link do storage
	docker exec -t $(CONTAINER) php artisan storage:link

docker-env-setup:  ## Copia o .env.example para o .env
	docker exec -t $(CONTAINER) cp .env.example .env

docker-key: docker-up docker-clear docker-env-setup## Gera a chave de criptografia do .env
	docker exec -t $(CONTAINER) php artisan key:generate

help: ## Mostra o menu de ajuda
	@grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(firstword $(MAKEFILE_LIST)) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}'

docker-artisan: ## Roda o artisan
	docker exec $(CONTAINER) /bin/bash -c "php artisan $(wordlist 2,$(words $(MAKECMDGOALS)),$(MAKECMDGOALS))"

docker-migrate: ## Executa a migracao do banco
	docker exec $(CONTAINER_BACK) /bin/bash -c "php artisan migrate --seed"
