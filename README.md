## Dependências

1. Docker
2. Docker Compose

## Instruções

1. Para executar o servidor, execute:

`docker-compose up -d --build`

2. Executar as migrações e seeders
    1. `docker-compose exec php-fpm bash`
    2. `php artisan migrate`
    3. `php artisan db:seed`

3. O endereço padrão da API é: `http://localhost:8081/api/`