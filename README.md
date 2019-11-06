# Laravel 5.7 - Private real-Time notifications with Socket.io and Redis 

The app simulates a cryptocurrency exchanging platform and uses Laravel Notifications classes to notifies a user in real-time about new transfers.

### Installation

**You will need the Redis installed and running in your environemnt;**

```
$ npm install -g laravel-echo-server;
$ mv laravel-echo-server.json.example laravel-echo-server.json 
$ composer install
$ npm install && npm run dev
$ php artisan migrate
```

On your .env file replace fill with your environment data:
```
BROADCAST_DRIVER=redis

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null 
REDIS_PORT=6379

DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

### Running the application

```
$ laravel-echo-server start
```

License
----

MIT

**by [Thiago Mallon]**

 [Socket.io]: <https://socket.io/>
 [Vue.js]: <https://vuejs.org/>
 [Redis]: <https://redis.io/>
 [Predis]: <https://github.com/nrk/predis>
 [Laravel Events]: <https://laravel.com/docs/5.7/events>
 [Laravel Listeners]: <https://laravel.com/docs/5.7/events#queued-event-listeners>
 [Laravel Notifications]: <https://laravel.com/docs/5.7/notifications>
 [Laravel Channels]: <https://laravel.com/docs/5.7/broadcasting#defining-channel-classes>
 [Laravel Validation Rules]: <https://laravel.com/docs/5.7/validation#custom-validation-rules>
 [Laravel Form Requests]: <https://laravel.com/docs/5.7/validation#creating-form-requests>
 [Laravel Middleware]: <https://laravel.com/docs/5.7/middleware>
 [Laravel Echo]: <https://laravel.com/docs/5.7/broadcasting#installing-laravel-echo>
 [laravel-echo]: <https://www.npmjs.com/package/laravel-echo>
 [laravel-echo-server]: <https://www.npmjs.com/package/laravel-echo-server>
 [Thiago Mallon]: <https://www.linkedin.com/in/thiago-mallon/>
 [Laravel-Real-time_Socket-io]: <https://github.com/jamesmallon/Laravel-Real-time_Socket-io>
