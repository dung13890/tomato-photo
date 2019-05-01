# We-edit Site

## Project was builded by Mr. D
* php7.1
* php-fpm7.1
* caddy-server
* mysql5.7.19

## Run with docker
> Git
> Required Docker && docker-compose

```sh

$ git clone git@github.com:dung13890/we-edit.git we-edit
$ cd we-edit

$ docker-compose up -d
```


## Start Project

```sh
$ docker-compose exec workspace bash

// Inside docker
$ composer install --no-interaction
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate:refresh --seed

$ npm install
$ bower install --allow-root

$ npm run dev

```

## Generate js

```sh
// Generate laroute
$ php artisan laroute:generate

// Generate message lang
$ php artisan lang:js --no-lib
```
