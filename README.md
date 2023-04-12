# Holder API
Este repositório tem o intuito do desenvolvimento de uma funcionalidade teste para a vaga de desenvolvedor PHP/Laravel da Holder+.

## Instalação
- No seu terminal acesse a raiz do projeto após clonado e siga os seguintes passos.
- Execute o comando `cp .env.example .env` para criar o arquivo de ambientes do projeto.
- Execute agora `composer install` para instalar as dependências do projeto.
- Execute `php artisan key:generate` para gerar a hash key do projeto.
- Agora vamos acessar o arquivo com o seu editor de texto e configurar o .env para que seja configurado o banco de dados.
- Após configurar o seu .env vamos executar as migrations `php artisan migrate`.
- Como o banco de dados ainda não existe o laravel vai te perguntar se deseja criar o banco de dados você deverá informas que sim e pronto.
- Agora só precisamos iniciar o servidor e acessar nossa API `php artisan serve` por padrão o laravel usará a porta 8000 ficando http://localhost:8000
