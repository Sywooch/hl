<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'pmt-LvrvfO5c91Bne3GwlfBNxVY9w8_0',
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
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'class'=>'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                
                'campaing-all' => 'yandex-context/campaings',
                'campaing-ads/<id_ad:\d+>' => 'yandex-context/ads',
                'campaing-keywords/<id_ad:\d+>' => 'yandex-context/keywords',
                'campaing-keywords/<action>/<id_ad:\d+>/<id_keywords:\d+>' => 'yandex-context/<action>',
                
                
                '<controller>/<action>' => '<controller>/<action>',                
                'login.html'            => 'user/login',
                'logout.html'           => 'user/logout',
                
                'registration.html'     => 'user/registration',
                
                ''                      => 'yandex-context/campaings',
                
                
            ],
        ],
    ],
    'params' => $params,
    
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}


return $config;
