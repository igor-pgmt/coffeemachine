<?php

$params = require __DIR__ . '/params.php';

$config = [
    'id' => 'basic',
    'name' => 'Кофемашина',
    'defaultRoute' => 'coffee/index',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'HOCx9GIeomGqSslX06wrT-H1Pe7qblgH',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'mongodb' => [
                    'class' => '\yii\mongodb\Connection',
                    'dsn' => 'mongodb://@localhost:27017/coffeemachine',
                    'options' => [
                        "username" => "Admin",
                        "password" => "777"
                    ]
                ],
            ],
        'modules' => [
            'gii' => [
                'class' => 'yii\gii\Module',
                'generators' => [
                    'mongoDbModel' => [
                        'class' => 'yii\mongodb\gii\model\Generator'
                    ]
                ],
            ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';

}

return $config;
