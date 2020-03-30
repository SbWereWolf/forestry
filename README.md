# How to install
## Pre requirements
 - php 7.4
 - MySql ~5.7
 - [Composer](https://getcomposer.org/)
 - [Node.js](https://nodejs.org/)

## Configure
 - Copy `.env.example` to `.env`
 - define settings (db credentials) in `.env`
## Install
```
composer install
php artian key:generate
php artian migrate
npm install
npm run dev
```
# How to use
Open in browser the link `%app-host%/admin/`

Default user defined in 
`database/migrations/2020_03_24_214249_fill_default_admin_user_and_permissions.php`
 - default login `administrator@brackets.sk` 
 - default password `PjucggYEOK`
