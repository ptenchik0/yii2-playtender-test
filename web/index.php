<?php

require __DIR__ . '/../app/vendor/autoload.php';
require __DIR__ . '/../app/functions.php';

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG',  env('YII_DEBUG'));
defined('YII_ENV') or define('YII_ENV', env('YII_ENV', 'prod'));

require __DIR__ . '/../app/vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../app/config/web.php';

(new yii\web\Application($config))->run();
