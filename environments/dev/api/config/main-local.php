<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
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
        'generators' => [
            'rest-module' => [
                'class' => 'tunecino\builder\extra\gii\restModule\Generator', // custom generator class
            ],
            'rest-crud' => [
                'class' => 'tunecino\builder\extra\gii\restCrud\Generator', // custom generator class
            ],
        ],
    ];

    $config['bootstrap'][] = 'builder';
    $config['modules']['builder'] = [
        'class' => 'tunecino\builder\Module',
        'yiiScript' => dirname(dirname(__DIR__)) . '/yii',
        'previewUrlCallback' => function($entity) {
            $moduleName = $entity->schema->moduleID ? $entity->schema->moduleID . '/' : '';
            return \yii\helpers\Url::toRoute( '/' . $moduleName . \yii\helpers\Inflector::pluralize($entity->name) , true);
        },
        'commands' => [
            [
                'class' => 'tunecino\builder\generators\migration\Generator',
            ],

            // run default app migration scripts if any
            'yii migrate/up --interactive=0',

            [
                'class' => 'tunecino\builder\generators\restModule\Generator', // custom generator class
                'defaultAttributes' => [
                    'generateAsModule' => true,
                    'moduleNamespace' => 'api\modules',
                ],
            ],
            [
                'class' => 'tunecino\builder\generators\model\Generator',
                'defaultAttributes' => [
                    'ns' => 'api\modules\v1\models',
                    'queryNs' => 'api\modules\v1\models',
                ],
            ],
            [
                'class' => 'tunecino\builder\generators\restCrud\Generator', // custom generator class
                'defaultAttributes' => [
                    'modelNamespace' => 'api\modules\v1\models',
                    'controllerNamespace' => 'api\modules\v1\controllers',
                    'baseControllerClass' => 'yii\rest\ActiveController',
                ],
            ],
            function($schema) {
                $moduleName = $schema->moduleID ? $schema->moduleID . '/' : '';
                $ctrlNames = \yii\helpers\ArrayHelper::getColumn($schema->entities,'name');
                $controllers = '';
                for ($i=0; $i < count($ctrlNames); $i++) { 
                    $controllers .= $moduleName . $ctrlNames[$i];
                    if ($i+1 < count($ctrlNames)) $controllers .= ',';
                }
                return 'yii builder/helpers/add-rest-rules-to-file @api/config/rules.php ' . $controllers;
            }
        ],
    ];
}

return $config;
