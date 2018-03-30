##### composer
```
"predis/predis": "~1.0",
"php-amqplib/php-amqplib": "2.6.2",
"phpoffice/phpexcel": "^1.8",
"maatwebsite/excel": "^2.1"

"phpspec/phpspec": "~2.1",
"barryvdh/laravel-debugbar": "^2.4"
```

---
##### laravel debug
```
# app.php
Barryvdh\Debugbar\ServiceProvider::class, # 开启laravel debuger
'Debugbar' => Barryvdh\Debugbar\Facade::class, # 开启laravel debuger
php artisan vendor:publish
```