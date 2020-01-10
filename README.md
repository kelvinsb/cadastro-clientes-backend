## Dependências

1. Docker
2. Docker Compose

## Instruções

1. Para executar o servidor, execute:

`docker-compose up -d --build`

2. Executar as migrações e seeders
    1. `docker-compose exec php-fpm bash`
    2. `composer install`
    3. `php artisan migrate`
    4. `php artisan db:seed`
3. Adicionar permissao para storage
    1. `sudo chmod -R 777 PASTADOPROJETO/server/storage/`

4. O endereço padrão da API é: `http://localhost:8081/api/`

**.env da pasta principal**
```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=projeto
DB_USERNAME=projeto
DB_PASSWORD=senhaprojeto
```

**.env da pasta server**
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:y39bK0bX9wffcqr8gh0wK3z3KpyyDoVxtmC3V+9l0kE=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=projeto
DB_USERNAME=projeto
DB_PASSWORD=senhaprojeto

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```