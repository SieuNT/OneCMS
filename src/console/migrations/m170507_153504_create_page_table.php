<?php

use yii\db\Migration;

/**
 * Handles the creation of table `page`.
 */
class m170507_153504_create_page_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%page}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%page}}');
    }
}
