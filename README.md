# Task Manager Project

### Created by Alan Sanchez

https://github.com/CodeAlanSanchez/coalition-test

## Installation

1. run `git clone https://github.com/CodeAlanSanchez/coalition-test`
2. cd into project `cd coalition-test`
3. Install npm packages `npm install`
4. Install composer packages `composer install`
5. Copy .env.example file to .env `cp .env.example .env`
6. Fill in .env with MySql database credentials and info
7. Generate encryption keys `php artisan key:generate`
8. Migrate and seed the databse `php artisan migrate:fresh --seed`
9. Build javascript and css files `npm run build`
10. Start application `php artisan serve`
