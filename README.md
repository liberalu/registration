Instalion
=========

git clone https://github.com/liberalu/registration.git
composer install
bower install
bin/console doctrine:schema:update --force

Run
=========
bin/console server:start -e=prod

Required
========

PHP7
composer
bower
More http://symfony.com/doc/current/reference/requirements.html

