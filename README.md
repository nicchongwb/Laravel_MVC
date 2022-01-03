# Laravel_MVC
To familiarize with PHP MVC framework for OSWE prep

## Set up
- [Laravel Doc](https://laravel.com/docs/8.x/installation)

Install [composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos)

```bash
# Download composer installer in any dir
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

# Execute composer-setup
php composer-setup.php

# Move the .phar to /bin PATH dir for global call
sudo mv composer.phar /usr/local/bin/composer
```

Install Laravel

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

## Running dev server
```bash
cd larassc
code . # open VSCode
php artisan serve

wsl --shutdown # Restart wsl if port don't get portfwd to Host

# If all else fails
php artisan serve --host 0.0.0.0 # Browse WSL_IP:8000
```
