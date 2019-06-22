<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%region}}`.
 */
class m190621_161747_create_region_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%region}}', [
            'id_wilayah' => $this->primaryKey()->notNull(),
            'nama_wilayah' => $this->string(100)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%region}}');
    }
}
