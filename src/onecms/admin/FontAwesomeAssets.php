<?php
namespace onecms\admin;

use yii\web\AssetBundle;
/**
 * @author Nguyen Tuan Sieu <tuan@siêu.vn>
 * @since 1.0
 */
class FontAwesomeAssets extends AssetBundle
{
    public $sourcePath = '@bower/fontawesome';
    public $js = [];
    public $css = [
        'css/font-awesome.css',
    ];
    public $depends = [];
}