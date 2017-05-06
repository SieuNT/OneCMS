<?php

namespace OneCMS\admin;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use \yii\widgets\Menu as BaseMenu;

class MenuAside extends BaseMenu {
    public $activateParents = true;
    public $linkTemplate = '<a href="{url}"><i class="{icon}"></i> <span>{label}</span></a>';
    public $options = [
        'class' => 'list-unstyled'
    ];
    public $submenuTemplate = '<ul class="list-unstyled">{items}</ul>';

    protected function renderItem($item)
    {
        if (isset($item['url'])) {
            $template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);

            return strtr($template, [
                '{url}' => Html::encode(Url::to($item['url'])),
                '{icon}' => isset($item['icon']) ? $item['icon'] : 'ion-android-radio-button-on',
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