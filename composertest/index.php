<?php

//一度だけautoloadファイルを読み込む必要あり
require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\TestController;

$app = new TestController;
$app->run();
