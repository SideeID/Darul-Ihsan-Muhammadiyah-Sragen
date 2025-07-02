# CMS INAGATA

## Stack Tech
- laravel 10
- minimum php 8.3
- mariadb / mysql


## Scripts to Run
### 1. Running Composer
For Production
```
composer install --no-dev
```

For Develop
```
composer install
```

### 2. Running Script
```
php artisan key:generate
php artisan storage:link
php artisan migrate
```
