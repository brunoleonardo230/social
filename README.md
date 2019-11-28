# social

## Implantação em ambiente linux

#### Entrar na pasta do servidor local e colar o comando abaixo

exemplo: cd /var/www/html/

git clone https://github.com/brunoleonardo230/social.git

##### entrar na pasta do projeto

cd /social

## Framework Laravel 6

### Instalação

#### Comandos necessários

#### Instalar dependencias
composer install

#### Criar .env:
sudo cp .env-example .env

#### Gerar chave .env
php artisan key:generate

#### Executar migrates e seeds
php artisan migrate --seed

