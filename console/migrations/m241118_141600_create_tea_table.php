<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tea}}`.
 */
class m241118_141600_create_tea_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    final public function safeUp()
    {
        $this->createTable('{{%tea}}', [
            'id' => 'int NOT NULL AUTO_INCREMENT',
            'title' => $this->string()->notNull(),
            'en_title' => $this->string()->notNull(),
            'id_collection' => $this->integer(),
            'subtitle' => $this->string(),
            'en_subtitle' => $this->string(),
            'description' => $this->string(),
            'en_description' => $this->string(),
            'background_image' => $this->string(),
            'image' => $this->string(),
            'en_image' => $this->string(),
            'weight' => $this->string(),
            'en_weight' => $this->string(),
            'brewing_temperature' => $this->string(),
            'en_brewing_temperature' => $this->string(),
            'brewing_time' => $this->string(),
            'en_brewing_time' => $this->string(),
            'buy_button' => $this->boolean(),
            'shop_link' => $this->string(),
            'en_shop_link' => $this->string(),
            'API_priority' => $this->integer(),
            'PRIMARY KEY(id)'

        ]);

        $this->addForeignKey('FK_tea_collection', '{{%tea}}', 'id_collection', '{{%tea_collection}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    final public function safeDown()
    {
        $this->dropTable('{{%tea}}');
    }
}
