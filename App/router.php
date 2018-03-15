<?php
//路由设置
$app->group(['module' => 'Home'], function () use ($app) {
    $app->get('/test', 'Index:test');
    // $app->post('/test-info', 'Index:test');

    // 通配路由组
    $app->any('/(:class(/:method(/:params+)))', ["controller" => "class", "action" => "method"]);
});
