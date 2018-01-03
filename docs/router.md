```
基本分组
对于组织一组关联性较强的路由，路由组是一个非常有用的方法帮你解决重复的URL片段。看下面的列子：

<?php

// API group
$app->group('/api', function () use ($app) {

    // Library group
    $app->group('/library', function () use ($app) {

        // Get book with ID
        $app->get('/books/:id', function ($id) {

        });

        // Update book with ID
        $app->put('/books/:id', function ($id) {

        });

        // Delete book with ID
        $app->delete('/books/:id', function ($id) {

        });

    });

});
上面定义的路由能匹配到的URL分别是:

GET    /api/library/books/:id
PUT    /api/library/books/:id
DELETE /api/library/books/:id
Route groups are very useful to group related routes and avoid repeating common URL segments for each route definition.

子域名路由
简单域名匹配
子域名路由也是通过路由组的形式来实现，可以通过domain属性为组路由设置绑定域名：请看下面列子：

$app->group(['domain' => 'api.house.hhailuo.com'], function () use ($app) {
 $app->map('/upload', 'File:upload')->via('POST', 'OPTIONS');
 $app->post('/crop', 'File:crop');

 // 通配路由组
 $app->any('/(:class(/:method(/:params+)))', ["controller" => "class", "action" => "method"]);
});
泛域名匹配
将domain指定为{var}花括号内的部分将会被正则匹配，并且domain也会被作为路由参数传递到对应的action或者闭包函数内。

$app->group(['domain' => '{domain}.house.hhailuo.com', 'module' => 'Home'], function () use ($app) {
  $app->map('/upload', 'File:upload')->via('POST', 'OPTIONS');
  $app->post('/crop', 'File:crop');
  $app->get('/', function($domain) {
     echo $domain;
  });
});
域名与分组绑定
可以通过module属性为组路由设置绑定分组：

<?php
$app->group(['domain' => 'admin.house.hhailuo.com', 'module' => 'Admin'], function () use ($app) {
 // $app->any();
 // 通配路由
 $app->any('/(:class(/:method(/:params+)))', ["controller" => "class", "action" => "method"]);
});
路由前缀
可以通过prefix属性为组路由设置前缀：

<?php
$app->group(['prefix' => '/admin', 'domain' => 'admin.house.hhailuo.com', 'module' => 'Admin'], function () use ($app) {
 // $app->any();
 // 通配路由
 $app->any('/(:class(/:method(/:params+)))', ["controller" => "class", "action" => "method"]);
});
```
