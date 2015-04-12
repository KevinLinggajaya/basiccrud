Laravel 5 Basic CRUD & Simple Report
------------------------------------
## Introduction
This is a quick project for an interview test that I've got in one of local company.
Since I think there are still few example on how Laravel 5 do basic CRUD, I put it as public source. Feel free to grab and modify it for your own use.

Story of the test :
1. Create a Laravel project with name of basiccrud
2. Create a simple login page
3. After login, please redirect the page to basiccrud/admin
4. Admin page will contain 3 menus, products, orders and reporting
5. The products page will have list of products that each of product can have multiple details of variation (color, size, stocks, price and weight). Please provide link to add and remove the product.
6. The orders page will have list of orders (date, order numbers, purchased product, total price) and also link to add and remove the order. One order can contain different products. On adding an order, product can be picked by listing all the available products and then provide a checkbox to choose which product that will be purchased.
7. Reporting page will provide report :
Product name and total product that being sold on certain time frame (montly filter) ordered by the biggest sales.


With all the story, validation, style, details, etc etc, it takes me around 15 hours to finished it. 

## Requirement
PHP, Laravel 5 & MySQL


## Installation

In order to use this example, make sure to update .env.example become .env with your own db settings
```
DB_HOST=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

For a fresh DB install just migrate all the tables with prepared seed :
```bash
php artisan migrate --seed

```

Or you can use predefined data by importing DB using backup SQL :
```
database\sql\basiccrud.sql
```

After you configure all DB setup, run the app using
```bash
php artisan serve
```

Go to your browser and hit the page through this url
```
http://localhost:8000
```

You will see a basic login page before go through the example, input the predefined default email and password 
```
email: admin@admin.com
password: admin
```