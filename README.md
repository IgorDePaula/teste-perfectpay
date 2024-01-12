# Teste vaga senior perfect pay

Foi construido um sistema para pagamentos online, via pix, cartao de credito e boleto.

Para rodar o sisetma e necessario estar com [php 8.1 e as dependencias do laravel junto com mysql](#com-php)
ou [docker (docker compose) junto com o make.](#com-docker)

### Com Php

1. clonar o sistema
2. modificar o arquivo .env.example para .env, e suas credenciais de banco de dados bem como da api do Asaas.
3. Rode o composer para instalar as dependencias.
4. Rode o `php artisan migrate --seed`
3. Entrar no endpoint http://localhost:8000/products

### Com Docker

1. clonar o sistema
2. modificar o arquivo .env.example para .env, e suas credenciais de banco de dados bem como da api do Asaas.
3. Com o make instalado, rodar apenas `make` no terminal lhe dara algumas ferramentas uteis. Inicie
   com `make docker-install`. Ele fara a instalacao das dependencias, e a migracao do banco junto com o seed.
4. para subir o container utilize `make docker-up`, para descer `make docker-down` e para usar a bash do
   container  `make docker-bash`, para formatar `make docker-format` e para testar `make docker-test`

