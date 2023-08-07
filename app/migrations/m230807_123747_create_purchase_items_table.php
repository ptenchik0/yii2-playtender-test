<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%purchase_items}}`.
 */
class m230807_123747_create_purchase_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%purchase_items}}', [
            'id' => $this->primaryKey(),
            'purchase_id' => $this->integer(11)->notNull(),
            'description' => $this->text()->notNull(),
            'amount' => $this->integer(11)->notNull(),
            'unit' => $this->tinyInteger(2)->notNull(),
        ]);

        $this->addForeignKey('{{%purchase_items_purchase_id_fk}}', '{{%purchase_items}}', 'purchase_id', '{{%purchase}}', 'id', $this->cascade, $this->restrict);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%purchase_items}}');
    }
}
