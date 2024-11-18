<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tea_collection}}`.
 */
class m241118_141543_create_tea_collection_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    final public function safeUp()
    {
        $this->createTable('{{%tea_collection}}', [
            'id' => 'int NOT NULL AUTO_INCREMENT',
            'title' => $this->string()->notNull(),
            'en_title' => $this->string()->notNull(),
            'subtitle' => $this->string(),
            'en_subtitle' => $this->string(),
            'color' => $this->string(),
            'image' => $this->string(),
            'PRIMARY KEY(id)'


        ]);
    }

    /**
     * {@inheritdoc}
     */
    final public function safeDown()
    {
        $this->dropTable('{{%tea_collection}}');
    }
}
