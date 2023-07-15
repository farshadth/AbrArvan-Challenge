## Docker
use the following command to run docker:

```php
docker compose up -d --build
```

List of images:

`php` `mysql` `phpmyadmin` `redis`

Then run the following command for migration:

```php
php artisan migrate --seed
```

Then run the following command to listen to the subscribe channel of redis:

```php
php artisan redis:subscribe
```

And finally run the following command to listen to the queue:

```php
php artisan queue:work
```

You can access the databse by the following address: (username and password are exist in .env)

```php
http://localhost:9090
```

The base address for calling the APIs:

```php
http://localhost:8000
```

Download the postman API:

[Postman API Collection](https://github.com/farshadth/AbrArvan-Challenge/AbrArvan.postman_collection.json)

