<?php
namespace OneCMS\admin;

use yii\web\AssetBundle;
/**
 * @author Nguyen Tuan Sieu <tuan@sieulog.com>
 * @since 1.0
 */
class AdminAsset extends AssetBundle
{
    public $sourcePath = __DIR__.'/assets';
    public $js = [
        'js/pace.min.js',
        'js/wow.min.js',
        'js/sweetalert.min.js',
        'js/jquery.nicescroll.js',
        'js/jquery.scrollTo.min.js',
        'js/jquery.app.js',
    ];
    public $css = [
        '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300',
        'css/bootstrap-reset.css',
        'css/animate.css',
        'css/font-awesome.css',
        'css/ionicons.css',
        'css/sweetalert.css',
        'css/style.css',
        'css/helper.css',
    ];
    public $depends = [];
}