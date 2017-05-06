<?php
namespace OneCMS\admin;

use yii\web\AssetBundle;
/**
 * @author Nguyen Tuan Sieu <tuan@siêu.vn>
 * @since 1.0
 */
class IoniconAssets extends AssetBundle
{
    public $sourcePath = '@bower/ionicons';
    public $js = [];
    public $css = [
        'css/ionicons.min.css',
    ];
    public $depends = [];
}