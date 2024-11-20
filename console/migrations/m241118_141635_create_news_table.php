<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m241118_141635_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    final public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => 'int NOT NULL AUTO_INCREMENT',
            'title' => $this->string()->notNull(),
            'en_title' => $this->string()->notNull(),
            'API_priority' => $this->integer(),
            'date' => $this->integer()->notNull(),
            'description' => $this->string(),
            'en_description' => $this->string(),
            'text' => $this->string(),
            'en_text' => $this->string(),
            'image' => $this->string(),
            'status' => $this->integer(),
            'PRIMARY KEY(id)'


        ]);
    }

    /**
     * {@inheritdoc}
     */
    final public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
