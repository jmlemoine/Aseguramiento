<?php

$config = [
    'components' => [
        'view' => [
            'theme' => [
                'pathMap' => [
                   '@app/views' => '@backend/themes/admin'
                   //'@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                   //'@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/testing/app'
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'CdCYxgtbIfFPkT82BuUYwgPkK7siqKfN',
        ],

    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];

    $config['bootstrap'][] = 'builder';
    $config['modules']['builder'] = [
        'class' => 'tunecino\builder\Module',
        'yiiScript' => dirname(dirname(__DIR__)) . '/yii',
        'commands' => [
            [
                'class' => 'tunecino\builder\generators\migration\Generator'
            ],

            // run default app migration scripts if any
            'yii migrate/up --interactive=0',

            [
                'class' => 'tunecino\builder\generators\model\Generator',
                'defaultAttributes' => [
                    'ns' => 'backend\models',
                    'queryNs' => 'backend\models',
                ],
            ],
            [
                'class' => 'tunecino\builder\generators\crud\Generator',
                'defaultAttributes' => [
                    'baseViewPath' => '@backend/views',
                    'modelNamespace' => 'backend\models',
                    'controllerNamespace' => 'backend\controllers',
                ],
            ]
        ],
    ];
}

return $config;
