<?php

namespace OneCMS\sweetalert;

use yii\web\AssetBundle;

class SweetAlertAsset extends AssetBundle
{
    /**
     * @var string the directory that contains the source asset files for this asset bundle
     */
    public $sourcePath = '@OneCMS/sweetalert/assets';

    /**
     * @var array list of JavaScript files that this bundle contains
     */
    public $js = [
        'sweetalert.min.js',
    ];

    /**
     * @var array list of CSS files that this bundle contains
     */
    public $css = [
        'sweetalert.css',
    ];
}