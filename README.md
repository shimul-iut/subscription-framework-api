To install please follow the below steps:

- Prepare environment
```
 sudo apt-get update
 sudo apt-get install apache2 libapache2-mod-php7.2 php7.2 php7.2-xml php7.2-gd php7.2-opcache php7.2-mbstring php7.2-sqlite3 composer
 ```
- Clone repo :
 ```
 https://github.com/shimul-iut/subscription-framework-api.git
 ```
- Rename `.env.example` file to `.env`inside your project root and fill the database information.
- Change `app\config\database.php` configs accordingly
- Open the console and cd your project root directory
- Run `composer install` or ```php composer.phar install```
- Run `php artisan key:generate` 
- Run `php artisan migrate`
- Run `php artisan db:seed` to run seeders (I have seeded few pre-created users).
- Run `php artisan serve`

#####You can now access your project at localhost:8000 :)
