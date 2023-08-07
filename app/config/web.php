<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'playtenderTest',
    'name' => 'PlaytenderTest',
    'language' => 'ru-RU',
    'defaultRoute' => 'purchase',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'controllerMap' => [
        'error' => [
            'class' => 'yii\web\ErrorAction',
        ],
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
        'db' => $db,
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                    ],
                ],
            ],
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'locale' => 'uk_UA',
            'thousandSeparator' => ' ',
            'decimalSeparator' => '.',
            'numberFormatterSymbols' => [
                \NumberFormatter::CURRENCY_SYMBOL => 'грн.',
                \NumberFormatter::MONETARY_SEPARATOR_SYMBOL => '.',
            ],

        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<action:(login|logout|signup)>' => 'auth/<action>',
                '<controller:[\wd-]+>/<action:[\wd-]+>/' => '<controller>/<action>',
                '<controller:[\wd-]+>/<action:[\wd-]+>/<id:[\d-]+>' => '<controller>/<action>',
                '<module:[\wd\-]+>/<controller:[\wd\-]+>/<action:[\wd\-]+>/<id:[\d\-]+>' => '<module>/<controller>/<action>',
            ],
        ],
        'assetManager' => [
            'class' => '\yii\web\AssetManager',
            'linkAssets' => true,
            'bundles' => [
                'wbraganca\dynamicform\DynamicFormAsset' => [
                    'sourcePath' => null,
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'js' => [
                        'js/yii2-dynamic-form.js',
                    ],
                ],
            ]
        ],
    ],
    'modules' => [
        'purchase' => [
            'class' => 'app\modules\purchase\Purchase'
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