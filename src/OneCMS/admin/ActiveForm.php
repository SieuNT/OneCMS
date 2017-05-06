<?php

namespace OneCMS\admin;

use yii\bootstrap\ActiveForm as BaseActiveForm;

class ActiveForm extends BaseActiveForm {
    public $fieldClass = 'OneCMS\admin\ActiveField';
}