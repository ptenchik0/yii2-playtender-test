<?php

$params = require __DIR__ . '/params.php';

$config = [
    'id' => 'playtenderTest',
    'name' => 'PlaytenderTest',
    'defaultRoute' => 'auth',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '-DY7T3tSDgU7soDd6hZF-_st0clIOmyb',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'loginUrl' => ['auth/login'],
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => env('DB_DSN'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'charset' => env('DB_CHARSET', 'utf8'),
            'enableSchemaCache' => YII_ENV_PROD,
        ],

        'urlManager' => [
            'enablePrettyUrl' => false,
            'showScriptName' => false,
            /*'enableStrictParsing' => true,
            'rules' => [
                'register' => 'auth/signup',
                '<controller:[\wd-]+>/<action:[\wd-]+>/' => '<controller>/<action>',
                '<controller:[\wd-]+>/<action:[\wd-]+>/<id:[\d-]+>' => '<controller>/<action>',
            ],*/
        ],

    ],
    'params' => $params,
];

if (YII_DEBUG) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => yii\debug\Module::class,
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '192.168.178.20', '172.16.0.0/12'],
    ];
}

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '192.168.178.20', '172.16.0.0/12'],
    ];
}


return $config;