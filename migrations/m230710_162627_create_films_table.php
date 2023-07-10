<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%films}}`.
 */
class m230710_162627_create_films_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%films}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'image' => $this->string(10)->notNull(),
            'description' => $this->text()->notNull(),
            'duration' => $this->time()->notNull(),
            'age_restriction' => $this->string(3)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%films}}');
    }
}
