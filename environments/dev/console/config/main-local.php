<?php
return [
    'bootstrap' => ['gii', 'builder'],
    'modules' => [
        'gii' => [
	        'class' => 'yii\gii\Module',
	        'generators' => [
	            'rest-module' => [
	                'class' => 'tunecino\builder\extra\gii\restModule\Generator', // custom generator class
	            ],
	            'rest-crud' => [
	                'class' => 'tunecino\builder\extra\gii\restCrud\Generator', // custom generator class
	            ],
	        ],
	    ],
        'builder' => 'tunecino\builder\Module',
    ],
];