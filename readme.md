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
##### 新增Inc服务
```
# example
php artisan inc_read
```
##### 新增图片处理服务 Intervention Image
##### DB快速入门
##### 新增微信公众号开发
```angular2html
define("TOKEN", "iceupw");

   class WeiXinConfirm{
       private function checkSignature()
       {
           //1.接收微信发过来的get请求过来的4个参数
           $signature = $_GET["signature"];
           $timestamp = $_GET["timestamp"];
           $nonce = $_GET["nonce"]; //随机数

           //2.加密
           //1.将token,timestamp,once 三个参数进行字典序排序
           $tmpArr = array(TOKEN,$timestamp,$nonce);
           sort($tmpArr,SORT_STRING);

           //2.将三个参数字符串拼接成一个字符串进行sha1加密
           $tmpStr =  implode($tmpArr);
           $tmpStr =  sha1($tmpStr);

           //3.将 加密后的字符串与$signature对比
           if( $tmpStr == $signature ){
               return true;
           }else{
               return false;
           }
       }

       public function valid()
       {
           if ($this->checkSignature()){
               echo $_GET["echostr"];
           }else{
               echo "hello world";
           }
       }


   }
    $wx = new WeiXinConfirm();
    $wx->valid();
    die;
```
   