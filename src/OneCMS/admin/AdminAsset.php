<?php
namespace OneCMS\admin;

use yii\web\AssetBundle;
/**
 * @author Nguyen Tuan Sieu <tuan@siêu.vn>
 * @since 1.0
 */
class AdminAsset extends AssetBundle
{
    public $sourcePath = __DIR__.'/assets';
    public $js = [
        'js/jquery.slimscroll.min.js',
        'js/app.js',
    ];
    public $css = [
        '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300',
        'css/AdminLTE.min.css',
        'css/skins/skin-blue.min.css',
        'css/font-awesome.min.css',
        'css/ionicons.min.css',
    ];
    public $depends = [];
}