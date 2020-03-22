# app
Test application for Schwarz Diensleistung KG

After cloning the repository, run the following commands:
- composer install
- php bin/console doctrine:database:create
- php bin/console doctrine:migrations:migrate
- php bin/console doctrine:fixtures:load

Do not forget to run the Unittest:
- php bin/phpunit

Enjoy it!
