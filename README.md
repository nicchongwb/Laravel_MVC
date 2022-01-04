# Laravel_MVC
To familiarize with PHP MVC framework for OSWE prep

## Set up
- [Laravel Doc](https://laravel.com/docs/8.x/installation)

### Install [composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos)

```bash
# Download composer installer in any dir
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

# Execute composer-setup
php composer-setup.php

# Move the .phar to /bin PATH dir for global call
sudo mv composer.phar /usr/local/bin/composer
```

### Install Laravel

```bash
composer global require laravel/installer

# To create laravel project
laravel new <project name>
cd <project name>
php artisan server # to run to server @port8000

# Add Laravel bin to PATH
sudo nano ~/.bashrc

# Add the following line to the bottom of .bashrc
export PATH="$PATH:$HOME/.config/composer/vendor/bin"

# Source bashrc
source ~/.bashrc

sudo apt install php-xml
composer i
composer update
```

### Install Tailwindcss with Laravel
[Tailwindcss installation guide](https://tailwindcss.com/docs/guides/laravel)

## Running dev server
```bash
cd larassc
code . # open VSCode
php artisan serve

wsl --shutdown # Restart wsl if port don't get portfwd to Host

# If all else fails
php artisan serve --host 0.0.0.0 # Browse WSL_IP:8000
```

### Install PostgreSQL
```bash
sudo apt update
sudo apt-get install php-pgsql
sudo apt install postgresql postgresql-contrib
psql --version

# Useful commands
sudo service postgresql status
sudo service postgresql start
sudo service postgresql stop

# Default admin user: postgres
sudo passwd postgres

# PgSQL shell
sudo su postgres # Change to postgres user
sudo -u postgres psql

Change postgres user password in ORDBMS:
ALTER USER postgres PASSWORD 'postgres';
```

Setup pgsql database:
```bash
# Enter psql shell
sudo -u postgres psql
\l # list all Database, check if larassc is in else create it
create database larassc;
exit

# PHP artisan migrate (ORM - look it up) to create Tables for larassc
php artisan config:clear
php artisan migrate:install
php artisan migrate
```

Utilising artisan make:migration to create/edit tables(schemas)
```bash
php artisan make:migration add_<col>_to_<tb name>_table

# edit relevant migration files up/down() and then run the following:
php artisan migrate

# rollback migration
php artisan migrate:rollback
```

## Starting Dev Env
```bash
sudo service postgresql start # Start pgsql service

cd larassc
php artisan serve --host 0.0.0.0

cd larassc
npm run watch # start npm modules eg. tailwindcss
```

## Development
Create controller:
```bash
php artisan make:controller <Name>Controller
# eg. RegisterController

# Creating Controller in sub dir (auto mkdir under app/http/controllers/
php artisan make::controller <Name of dir>/<Name>Controller
# eg. Auth/RegisterController
```

Create view:
1. Create a dir in resources/views, this dir name is same as the sub dir above (eg. auth)
2. Create a new file called <name>.blade.php (eg. register.blade.php) 

Middleware (filtering mechanism between request and response):
- eg. verify if user is authenticated or not
- HTTP/Middleware/Kernel.php : all our middleware headers and group definition

Protecting dashboard against unauthenticated access with middleware route:
- add '->middleware('auth')' to dashboard route in web.php OR
- under controller class: create a __construct() with '$this->middleware(['auth']);'


