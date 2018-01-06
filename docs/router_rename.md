```
命名路由
hg-php 可以让你为每一个路由设置一个名字。 被命名的路由能够通过 urlFor函数去动态的创建一个URL。

<?php
$app->get('/hello/:name', function ($name) {
    echo "Hello, $name!";
})->name('hello');
The route name() method is also chainable:

<?php
$app->get('/hello/:name', function ($name) {
    echo "Hello, $name!";
})->name('hello')->conditions(array('name' => '\w+'));
URL For
可以通过下面方式去生成一个命名路由的URL

<?php
//Create a named route
$app->get('/hello/:name', function ($name) use ($app) {
    echo "Hello $name";
})->name('hello');

//Generate a URL for the named route
$url = $app->router->urlFor('hello', array('name' => 'Josh'));
```
