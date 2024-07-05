<?php
namespace app\routes;

use app\controllers\Home;
use app\controllers\Site;

$app->get('/', Home::class . ":index");
$app->get('/home', Site::class . ":index")->add($logged);
