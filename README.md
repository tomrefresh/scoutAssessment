
## Prerequisites

- Apache/MySQL/PHP(7.4) server
- Composer installed        (https://getcomposer.org/download/)
- npm installed             (https://nodejs.org/en/download/)
- A mysql database + user

## Getting Started

- clone the repo
- navigate to the repo clone
- edit the .env file and update these fields with your database details: [DB_DATABASE,DB_USERNAME,DB_PASSWORD] (I have included the .env file inside the repo against standard practice to make this setup process simpler)
- Run the below command (install the laravel project
```
composer install
```
- Run the below command (install the scripts)
```
npm install
```
- Run the below command (build minified scripts/css)
```
npm build prod 
```
- *OPTIONAL* - Run the below command to create the users_dev table inside the database (No need if you have chosen a database that already has the table)
```
php artisan migrate 
```
- *OPTIONAL* - Run the below command to add 20 fake users to the table
```
php artisan db:seed 
```
- Run the below command (to start the server)
```
php artisan serve
```


Your local instance will be running on the url shown in the response from the above command.

