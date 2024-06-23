# meu-campeonato
Análise das entidades do sistema:
- Campeonatos
- Jogos
- Times

Iniciando projeto meu-campeonato:
- frontend:
ng new front-end
Which stylesheet format would you like to use? Sass (SCSS)
Do you want to enable Server-Side Rendering (SSR) and Static Site Generation (SSG/Prerendering)? Yes

- backend:

Crianção do projeto com Laravel 11
create-project laravel/laravel back-end 

Alteração no .env:

DB_CONNECTION=mysql
Adicionado credenciais do Mysql local

Configuração do projeto laravel:

composer install
php artisan migrate
php artisan serve

Instalação do passport:

Ativando extensão no php.ini
extension=sodium

php artisan install:api –passport

Would you like to use UUIDs for all client IDs? (yes/no) [no]:
 > yes
