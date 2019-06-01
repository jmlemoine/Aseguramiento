<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        //'@mdm/admin' => '@app/vendor/mdm/yii2-admin-2.8',
        // for example: '@mdm/admin' => '@app/extensions/mdm/yii2-admin-2.0.0',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',

    'bootstrap' => [
        'chiliec\vote\components\VoteBootstrap',
    ],
    'language' => 'es-ES', 

    'modules' => [
        'admin' => [
            'class' => 'backend\admin\Module',
            //'layout' => 'left-menu', // it can be '@path/to/your/layout'.
            'mainLayout' => '@backend/views/layouts/main.php',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'backend\admin\controllers\AssignmentController',
                    //'userClassName' => 'common\models\User',
                    'userClassName' => 'backend\admin\models\User',
                    'idField' => 'user_id'
                ],
                /*
                'other' => [
                    'class' => 'path\to\OtherController', // add another controller
                ],
                */
            ],
            
            'menus' => [

                'menu' => null, // disable menu route
            ]
            
        ],

        'notifications' => [
            'class' => 'machour\yii2\notifications\NotificationsModule',
            // Point this to your own Notification class
            // See the "Declaring your notifications" section below
            'notificationClass' => 'common\components\Notification',
            // Allow to have notification with same (user_id, key, key_id)
            // Default to FALSE
            'allowDuplicate' => false,
            // Allow custom date formatting in database
            'dbDateFormat' => 'Y-m-d H:i:s',
            // This callable should return your logged in user Id
            'userId' => function() {
                return \Yii::$app->user->id;
            }
        ],

        'social' => [
            // the module class
            'class' => 'kartik\social\Module',
     
            // the global settings for the Disqus widget
            'disqus' => [
                'settings' => ['shortname' => 'DISQUS_SHORTNAME'] // default settings
            ],
     
            // the global settings for the Facebook plugins widget
            'facebook' => [
                'appId' => 'FACEBOOK_APP_ID',
                'secret' => 'FACEBOOK_APP_SECRET',
            ],
     
            // the global settings for the Google+ Plugins widget
            'google' => [
                'clientId' => 'GOOGLE_API_CLIENT_ID',
                'pageId' => 'GOOGLE_PLUS_PAGE_ID',
                'profileId' => 'GOOGLE_PLUS_PROFILE_ID',
            ],
     
            // the global settings for the Google Analytics plugin widget
            'googleAnalytics' => [
                'id' => 'UA-121995970-1',
                'domain' => 'mescytapp.com',
                'noscript' => 'Analytics cannot be run on this browser since Javascript is not enabled.',
            ],
     
            // the global settings for the Twitter plugin widget
            'twitter' => [
                'screenName' => 'TWITTER_SCREEN_NAME'
            ],
     
            // the global settings for the GitHub plugin widget
            'github' => [
                'settings' => ['user' => 'GITHUB_USER', 'repo' => 'GITHUB_REPO']
            ],
        ],

        'gridview' => [
            'class' => '\kartik\grid\Module',
        ],

        'vote' => [
            'class' => 'chiliec\vote\Module',
            // show messages in popover
            'popOverEnabled' => true,
            // global values for all models
            'allowGuests' => true,
            // 'allowChangeVote' => true,
            'models' => [
                // example declaration of models
                // \common\models\Post::className(),
                // 'backend\models\Post',
                // 2 => 'frontend\models\Story',
                // 3 => [
                //     'modelName' => \backend\models\Mail::className(),
                //     you can rewrite global values for specific model
                //     'allowGuests' => false,
                //     'allowChangeVote' => false,
                // ],
            ],      
        ],

        'datecontrol' => [
            'class' => '\kartik\datecontrol\Module',
            // see settings on http://demos.krajee.com/datecontrol#module
        ],
    ],

    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
            'defaultRoles' => ['admin', 'moderador', 'presentador','participante'],
        ],

        //can name it whatever you want as it is custom
        'urlManagerBackend' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => 'mescyt/backend/web/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],

        //Yii::$app->urlManagerBackend->baseUrl;
        
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
