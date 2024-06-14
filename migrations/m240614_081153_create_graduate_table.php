<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%graduate}}`.
 */
class m240614_081153_create_graduate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%graduate}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%graduate}}');
    }
}
