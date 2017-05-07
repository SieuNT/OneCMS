<?php

namespace onecms\admin;

class ActiveField extends \yii\bootstrap\ActiveField {
    public $checkboxTemplate = '<div class="checkbox">{beginLabel}{input}<span class="text">{labelTitle}</span>{endLabel}{error}{hint}</div>';
}