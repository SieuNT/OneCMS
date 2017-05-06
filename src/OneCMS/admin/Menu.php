<?php

namespace OneCMS\admin;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

class Menu extends \yii\widgets\Menu {
    public $activateParents = true;
    public $linkTemplate = '<a href="{url}"><i class="{icon}"></i> <span>{label}</span></a>';
    public $options = [
      'class' => 'sidebar-menu'  
    ];
    public $submenuTemplate = '<ul class="treeview-menu">{items}</ul>';
    
    protected function renderItem($item)
    {
        if (isset($item['url'])) {
            $template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);

            return strtr($template, [
                '{url}' => Html::encode(Url::to($item['url'])),
                '{icon}' => isset($item['icon']) ? $item['icon'] : 'fa fa-circle-o',
                '{label}' => $item['label'],
            ]);
        } else {
            $template = ArrayHelper::getValue($item, 'template', $this->labelTemplate);

            return strtr($template, [
                '{label}' => $item['label'],
            ]);
        }
    }
}
