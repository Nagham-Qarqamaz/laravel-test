# to run:

1- make .env file and beware of:
    - database setting
    - FAKER_LOCALE put ar_SA if you want random arabic data or en_US for english data
    - APP_URL so the images work well

2- composer install

3- php artisan migrate

4- php artisan storage:link

5- copy content of folder '/Utils' into folder '/storage/app/public/'

6- php artisan db:seed

7- make a nova user using: php artisan nova:user

8- finally run: php artisan serve 
