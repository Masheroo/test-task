<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sessions}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%films}}`
 */
class m230710_165646_create_sessions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sessions}}', [
            'id' => $this->primaryKey(),
            'film_id' => $this->integer()->notNull(),
            'datetime' => $this->dateTime()->notNull(),
            'cost' => $this->integer()->notNull(),
        ]);

        // creates index for column `film_id`
        $this->createIndex(
            '{{%idx-sessions-film_id}}',
            '{{%sessions}}',
            'film_id'
        );

        // add foreign key for table `{{%films}}`
        $this->addForeignKey(
            '{{%fk-sessions-film_id}}',
            '{{%sessions}}',
            'film_id',
            '{{%films}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%films}}`
        $this->dropForeignKey(
            '{{%fk-sessions-film_id}}',
            '{{%sessions}}'
        );

        // drops index for column `film_id`
        $this->dropIndex(
            '{{%idx-sessions-film_id}}',
            '{{%sessions}}'
        );

        $this->dropTable('{{%sessions}}');
    }
}
