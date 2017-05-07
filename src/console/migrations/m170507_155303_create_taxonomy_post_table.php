<?php

use yii\db\Migration;

/**
 * Handles the creation of table `taxonomy_post`.
 */
class m170507_155303_create_taxonomy_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('taxonomy_post', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('taxonomy_post');
    }
}
