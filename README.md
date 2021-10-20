# badania-api

## Requirements
```
php >= 8.0
```
## Setup
Clone repository
```
git clone https://github.com/longmaikel/badania-api.git
git clone git@github.com:longmaikel/badania-api.git
```

Install packages via Composer
```
composer install
```
Setup database connection in `.env` file
```
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
Create database table
```
php artisan migrate
```
Fill Database:
```
php artisan db:seed
```
Serve the application
```
php artisan serve
```
---
#API DOCS

## GET
### GET `api/tests`
Params
```
category: optional|string
```
examples
```
api/tests
api/tests?category=2
api/tests?category=1,2,3
```
### GET `api/test-categories`

## POST endpoints
### POST `api/tests`
Body
```
{
    "name":string
    "price":float 
}
```
### POST `api/test-categories`
Body
```
{
    "name":string
}
```

## PUT endpoints
### PUT `api/tests/{test_id}`
Body
```
{
    "name":string
    "price":float 
}
```
### PUT `api/test-categories/{test_category_id}`
Body
```
{
    "name":string
}
```

## DELETE endpoints
### DELETE `api/tests/{test_id}`
### DELETE `api/test-categories/{test_category_id}`
___

Made with <3 by Michał Kutaj
