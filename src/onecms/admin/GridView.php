<?php

namespace onecms\admin;
use yii\grid\GridView as BaseGridView;
use yii\helpers\Html;

class GridView extends BaseGridView {
    public $tableOptions = ['class' => 'table table-striped'];

    /**
     * Renders the table header.
     * @return string the rendering result.
     */
    public function renderTableHeader()
    {
        $cells = [];
        foreach ($this->columns as $column) {
            /* @var $column Column */
            $cells[] = $column->renderHeaderCell();
        }
        $content = Html::tag('tr', implode('', $cells), $this->headerRowOptions);
        if ($this->filterPosition === self::FILTER_POS_HEADER) {
            $content = $this->renderFilters() . $content;
        } elseif ($this->filterPosition === self::FILTER_POS_BODY) {
            $content .= $this->renderFilters();
        }

        return "<thead class='panel-heading'>\n" . $content . "\n</thead>";
    }
}