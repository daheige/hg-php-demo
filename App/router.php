<?php
$app->group(['module' => 'Home'], function () use ($app) {
    // 资讯
    $app->get('/test', 'Index:test');

    // 通配路由组
    $app->any('/(:class(/:method(/:params+)))', ["controller" => "class", "action" => "method"]);
});
