# Desa API
Restful API DESA bahasa Indonesia built with laravel

# Usage
1. Clone this repository
    ```bash
    git clone https://github.com/Amar-arruf/REST-API-Desa.git
    ```
2. Install dependecies (`composer`)
    ```bash
      composer install
    ```
3. Start the development environment 
    ```bash
    php artisan serve
    ```
4. setting DB `.env` with following:
    ```.env
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=api_desa
      DB_USERNAME=root
      DB_PASSWORD=
    ```
5. this case , project will use library [laravolt indonesia](https://github.com/laravolt/indonesia) reatrivat data , please following setup with laravolt,

6. visit http://localhost:8000

# Documentation
__API__ __PATH__ = http://localhost:8000/api/
<br> **postman colletction** : https://documenter.getpostman.com/view/11362142/2sA2r6WPbm

## All Desa
Get Latest Desa , Method `GET`
```
/api/desa
```
example : http://localhost:8000/api/desa

## specific Desa 
 Get Specific, Method `GET`
```
/api/desa/[id]
```
example : http://localhost:8000/api/desa/1

## update Desa
update Desa, Method `PUT`
```
/api/desa/[id]
```
example : http://localhost:8000/api/desa/1

## Delete Desa
Method `DELETE`
```
/api/desa/[id]
```
example : http://localhost:8000/api/desa/1


