<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'name' => 'Mescyt app',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language' => 'es-ES', 
    //'homeUrl' => '/administrator',
    'modules' => [
        /*
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu', // defaults to null, using the application's layout without the menu
            // other available values are 'right-menu' and 'top-menu'
            'mainLayout' => '@app/views/layouts/main.php',
            'controllerMap' => [
                'assignment' => [
                   'class' => 'mdm\admin\controllers\AssignmentController',
                   //'userClassName' => 'backend\models\User', 
                   'idField' => 'user_id',
                   'usernameField' => 'username',
                   /*
                   'fullnameField' => 'profile.full_name',
                   'extraColumns' => [
                       [
                           'attribute' => 'full_name',
                           'label' => 'Full Name',
                           'value' => function($model, $key, $index, $column) {
                               return $model->profile->full_name;
                           },
                       ],
                       [
                           'attribute' => 'dept_name',
                           'label' => 'Department',
                           'value' => function($model, $key, $index, $column) {
                               return $model->profile->dept->name;
                           },
                       ],
                       [
                           'attribute' => 'post_name',
                           'label' => 'Post',
                           'value' => function($model, $key, $index, $column) {
                               return $model->profile->post->name;
                           },
                       ],
                   ],
                   
                   'searchClass' => 'backend\models\UserSearch'
               ],
           ],
        ],
        */
        /*
        'build' => [
            'class' => 'backend\models\FormBuilder',
        ],*/
        
        'datecontrol' => [
            'class' => '\kartik\datecontrol\Module',
            // see settings on http://demos.krajee.com/datecontrol#module
        ],
        // If you use tree table
        'treemanager' =>  [
            'class' => '\kartik\tree\Module',
            // see settings on http://demos.krajee.com/tree-manager#module
        ]
    ],
    'components' => [
        
        'request' => [
            'csrfParam' => '_csrf-backend',
            //'baseUrl' => '/administrator'
        ],
        /*
        'assignment' => [
            'class' => 'mdm\admin\controllers\AssignmentController',
            'userClassName' => 'app\models\User',
            'idField' => 'user_id'
        ],
        */
        'user' => [
            //'identityClass' => 'common\models\User',
            //'identityClass' => 'backend\models\User',
            'identityClass' => 'backend\admin\models\User',
            //'loginUrl' => ['admin/user/login'],
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

         /*
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-black',
                ],
            ],
        ],
        */
        
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'rules' => [
                //'<alias:\w+>' => 'site/<alias>',
            ],
        ],
        
        
    ],

    /*
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            //'*',
            'site/*',
            'admin/*',
        
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],
    */

    'params' => $params,
];
