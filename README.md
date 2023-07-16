## Docker
use the following command to run the docker:

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

And finally, run the following command to listen to the queue:

```php
php artisan queue:work
```

You can access the database by the following address:

```php
http://localhost:9090
```

The base address for calling the APIs:

```php
http://localhost:8000
```

Download the Postman API:

[Postman API Collection](https://github.com/farshadth/AbrArvan-Challenge/blob/master/AbrArvan.postman_collection.json)

