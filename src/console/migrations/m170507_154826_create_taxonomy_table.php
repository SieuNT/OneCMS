<?php

use yii\db\Migration;

/**
 * Handles the creation of table `taxonomy`.
 */
class m170507_154826_create_taxonomy_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('taxonomy', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('taxonomy');
    }
}
