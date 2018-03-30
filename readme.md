##### composer
```
#composer json
"predis/predis": "~1.0",
"php-amqplib/php-amqplib": "2.6.2",
"phpoffice/phpexcel": "^1.8",
"maatwebsite/excel": "^2.1"

"phpspec/phpspec": "~2.1",
"barryvdh/laravel-debugbar": "^2.4"

#执行
composer uodate
```
---
##### laravel debug
```
# app.php
Barryvdh\Debugbar\ServiceProvider::class, # 开启laravel debuger
'Debugbar' => Barryvdh\Debugbar\Facade::class, # 开启laravel debuger
php artisan vendor:publish
```
---
##### nginx配置
```
location / {
            try_files $uri $uri/ /index.php?$query_string;

            index  index.html index.htm index.php;
            #autoindex  on;
        }
```
---
#####  GIT WARNING:  LF TO CTLR FOR WINDOWS
```
    git config --global core.autocrlf false
    
    #.gitattributes文件 删除
    * text=auto
```
---
##### maatwebsite/excel
```
# app.conf
Maatwebsite\Excel\ExcelServiceProvider::class,
'Excel' => Maatwebsite\Excel\Facades\Excel::class,
php artisan vendor:publish

# 演示php artisan export:example
```