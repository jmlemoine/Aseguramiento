<?php
return [
	[
	    'class' => 'yii\rest\UrlRule', 
	    'controller' => ['ping' => 'account'], 
	    'patterns' => [
	        'GET,HEAD' => 'ping',
	        'OPTIONS' => 'options',
	    ]
	],
	[
	    'class' => 'yii\rest\UrlRule', 
	    'controller' => ['account' => 'account'], 
	    'patterns' => [
	        'POST login' => 'login',
	        'POST signup' => 'signup',
	        'POST req-reset-pass' => 'request-password-reset',
	        'POST reset-pass' => 'reset-password',
	        // OPTTIONS VERBS
	        'OPTIONS login' => 'options',
	        'OPTIONS signup' => 'options',
	        'OPTIONS req-reset-pass' => 'options',
	        'OPTIONS reset-pass' => 'options',
	    ]
	],
	[
	    'class' => 'yii\rest\UrlRule', 
	    'controller' => ['token' => 'token'], 
	    'patterns' => [
	        'POST revoke' => 'revoke',
	        'POST refresh' => 'refresh',
	        // OPTTIONS VERBS
	        'OPTIONS revoke' => 'options',
	        'OPTIONS refresh' => 'options',
	    ]
	],
];