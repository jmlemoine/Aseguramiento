<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
$clients  = require __DIR__ . '/clients.php';
$rules  = require __DIR__ . '/rules.php';

return [
    'id' => 'app-auth',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'auth\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'user' => [
            'identityClass'   => 'auth\models\User',
            'enableSession'   => false,
            'enableAutoLogin' => false,
            'loginUrl'        => null,
        ],
        'client' => [
            'class'   => 'auth\models\Client',
            'dataList' => $clients,
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
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => $rules,
        ],
    ],
    'params' => $params,
];
