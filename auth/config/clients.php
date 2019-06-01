<?php
return [
    'web' => [
        'id' => 'public_web',
        'secret' => null,
        'resetUrl' => 'http://example.com/account-recovery/',
        'emailTokenLifeTime' => 3600, // 1 hour
        'refreshTokenLifeTime' => [
            'default' => 28800, // 8 hours
            'remember' => 157784630, // ~ 5 years
        ],
        'accessTokenLifeTime' => [
            'default' => 300, // 5 minutes
            'remember' => 1800, // 30 minutes
        ]
    ],
];