<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/shortcodes.css',
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        'css/main.css',
        'css/new.css',
        'css/responsive.css',
        'css/layout.css',
        'css/base.css',
    ];
    public $js = [
        'js/jquery-3.3.1.min.js',
        'js/popper.min.js',
        'js/bootstrap.min.js',
        'js/mdb.min.js',
        'js/app.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
