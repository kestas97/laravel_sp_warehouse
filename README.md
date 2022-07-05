<p align="center">SP-WAREHOUSE</p>



## About Project

I created this project on Laravel framework to make running a sports supplement warehouse easier. It is possible to raise new goods, create categories, flavors, location, manufacturers. You can also edit products, their units, etc. Also, this project can create and import new products from a CSV file and generate QR codes that will help you get product information faster.
Before starting, please read about Laravel [documentation](https://laravel.com/docs)


## Installing

1. Create folder larvel.
2. To terminal please write command: composer create-project laravel/laravel "project name".
3. composer require laravel/ui.
4. Bootstrap install command : php artisan ui bootstrap -auth.
5. Next command for bootstrap install: npm install && npm run dev.
6. For bootstrap complation : npm run watch.
7. It is necessary to add database login data to .env  for example:
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel
   DB_USERNAME=root
   DB_PASSWORD=
8. And last run first migrate command to terminal : php artisan migrate 


