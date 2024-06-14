<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee}}`.
 */
class m240614_081247_create_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employee}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'surname' => $this->string(255)->notNull(),
            'patronymic' => $this->string(255),
            'age' => $this->integer()->notNull()->check("age > 14 AND age < 120"),
            'gender' => $this->integer()->notNull()->check("gender = 0 OR gender = 1"),
            'graduate_id' => $this->integer(),
            'post_id' => $this->integer()
        ]);

        $this->createIndex(
            'idx-employee-graduate_id',
            'employee',
            'graduate_id'
        );

        $this->addForeignKey(
            'fk-employee-graduate_id',
            'employee',
            'graduate_id',
            'graduate',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-employee-post_id',
            'employee',
            'post_id'
        );

        $this->addForeignKey(
            'fk-employee-post_id',
            'employee',
            'post_id',
            'post',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employee}}');
    }
}
