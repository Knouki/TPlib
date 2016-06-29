# TPlib

Cloner le projet

cd TPlib/symfony-rest-edition

composer install

php app/console doctrine:database:create

php app/console doctrine:schema:update --force

php app/console doctrine:fixtures:load

php app/console server:run
