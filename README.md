<h1 align="center">AutoBy CRM</h1>
<img src="https://github.com/melvin-rulit/First-Crm/blob/master/public/images/AutoBy.png">

## Install
1) Download and install <a href="https://getcomposer.org/download/" target="_blank">Composer</a> in you system
2) Download this repository or clone
```sh
git clone https://github.com/melvin-rulit/AutoBy.git
```
3) We go to the project folder
```sh
cd AutoBy
```
3) Install dependencies
```sh
npm install
```
3) Run this command for generate new Laravel key
```sh
 php artisan key:generate
```
4) Rename ```.env.example``` to ```.env``` Setup the database configuration inside ```.env```
   
5) Run this command for run migrations in Data Base
```sh
php artisan migrate
```
6) Run this command for install dependencies
```sh
composer install
```
7) Run this command for install packages
```sh
npm install
```

## Launch
1) If you are developing on a local computer, you can run a built-in server
```sh
php artisan serve
```
2) If you want to run in a Docker container, then use <a href="https://github.com/melvin-rulit/Docker-php">instructions</a> 

3) Run this command for run a development server
```sh
npm run dev
```
