## Setup Github

##### 1. Check your ~/.ssh/id_rsa.pub 
`less ~/.ssh/id_rsa.pub` (Mac)

`type ~/.ssh/id_rsa.pub` (Windows)

##### if you don't have `.ssh/id_rsa.pub`

`ssh-keygen -t rsa -C "your_github_email@example.com"` 

##### Github > Settings > SSH and GPG keys

## Setup Docker

##### 1. Clone repository

`cd Desktop`

`git clone git@github.com:kredo-grobal-it-intern/5th_batch_app.git`

##### 2. Go to your directory

`cd 5th_batch_app`

##### 3. create .env

`cp .env.example .env`

##### 4. modify .env L12
<img width="400" alt="Screen Shot 2022-07-12 at 3 43 08 PM" src="https://user-images.githubusercontent.com/105486119/178426049-b936326c-e467-48d4-aca6-4b2103e5e6f0.png">

##### 5. sail up
`./vendor/laravel/sail/bin/sail up`




## Setup Local

##### 1. Clone repository
`git clone git@github.com:kredo-grobal-it-intern/5th_batch_app.git`

##### 2. Go to your directory
`cd Desktop`

`cd 5th_batch_app`

##### 3. Create .env
`cp .env.example .env`

##### 4. Modify .env L12
<img width="400" alt="Screen Shot 2022-07-12 at 3 43 08 PM" src="https://user-images.githubusercontent.com/105486119/178426049-b936326c-e467-48d4-aca6-4b2103e5e6f0.png">

##### 5. install php 
`php -v`

##### if you don't have any PHP version

`brew install php`

##### 6. Create Database
`mysql --version`

##### if you don't have mysql

`brew install mysql`

##### start mysql server
`mysql.server start`

##### login mysql 
`mysql -u root`

##### create your database 
`create database 5th_batch_app;`

##### exit mysql 
`exit`

##### 7. Install Composer Libraries
`composer install`

##### 8. Run migration and seeder
`php artisan migrate`

`php artisan db:seed`

##### 9. make images folder & Run storage:link
`mkdir storage/app/public/images`

`php artisan storage:link`

##### 10. Run npm
`npm install` 

##### if you don't have node plese install from below link

https://codelikes.com/mac-node-install/

`npm run dev`

##### 11. Set Application key
`php artisan key:generate`

##### 12. Server start
`php artisan serve`

##### 13. Visit a website
http://127.0.0.1:8000/

## Set Sequel Ace
<img width="400" alt="Screen Shot 2022-06-10 at 4 32 39 PM" src="https://user-images.githubusercontent.com/105486119/173014301-bf3c0b08-ae1a-48fa-930b-d13a8f8674b7.png">

##### Name: localhost/5th_batch_app
##### HOST: localhost
##### USERNAME: root
##### PASSWORD:     
##### DATABASE: 5th_batch_app
##### PORT: 3306
