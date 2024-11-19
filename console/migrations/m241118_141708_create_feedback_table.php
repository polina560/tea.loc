<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%feedback}}`.
 */
class m241118_141708_create_feedback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    final public function safeUp()
    {
        $this->createTable('{{%feedback}}', [
            'id' => 'int NOT NULL AUTO_INCREMENT',
            'name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'message' => $this->string()->notNull(),
            'created_at' => $this->integer()->comment('Дата создания'),
            'updated_at' => $this->integer()->comment('Дата изменения'),
            'moderation_status' => $this->integer()->comment('Дата изменения'),
            'comment' => $this->string(),
            'PRIMARY KEY(id)'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    final public function safeDown()
    {
        $this->dropTable('{{%feedback}}');
    }
}
