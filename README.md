<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
<a href="https://github.com/TheBSD/StandWithPalestine/blob/main/docs/README.md"><img src="https://raw.githubusercontent.com/TheBSD/StandWithPalestine/main/badges/StandWithPalestine.svg" alt="License"></a>
</p>

## Installation

1. Clone env file
    ```bash
    cp .env.example .env
    ```
2. Configuration .env file
3. Install composer dependencies
    ```bash
    composer install
    ```
4. Generate key
    ```bash
    php artisan key:generate
    ```
5. Run migration and seed
    ```bash
    php artisan migrate --seed
    ```
6. Run application
    ```bash
    php artisan serve
    ```
7. Login to application
   - Admin link: http://localhost:8000/admin/login
   - Tenant link: http://localhost:8000/app/login
   - Account:
     - Email: admin@saas.test
     - Password: password
