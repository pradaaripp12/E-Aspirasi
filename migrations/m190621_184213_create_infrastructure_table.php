<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%infrastructure}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%aspiration}}`
 */
class m190621_184213_create_infrastructure_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%infrastructure}}', [
            'id_master' => $this->string(25)->notNull(),
            'longtitude' => $this->decimal(10,7),
            'latitude' => $this->decimal(10,7),
            'status_infrastruktur' => $this->string(50),
            'jenis_infrastruktur' => $this->string(50),
        ]);
        
        $this->addPrimaryKey('id_master_pk','infrastructure','id_master');

        // creates index for column `id_master`
        $this->createIndex(
            '{{%idx-infrastructure-id_master}}',
            '{{%infrastructure}}',
            'id_master'
        );

        // add foreign key for table `{{%aspiration}}`
        $this->addForeignKey(
            '{{%fk-infrastructure-id_master}}',
            '{{%infrastructure}}',
            'id_master',
            '{{%aspiration}}',
            'id_master',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%aspiration}}`
        $this->dropForeignKey(
            '{{%fk-infrastructure-id_master}}',
            '{{%infrastructure}}'
        );

        // drops index for column `id_master`
        $this->dropIndex(
            '{{%idx-infrastructure-id_master}}',
            '{{%infrastructure}}'
        );

        $this->dropTable('{{%infrastructure}}');
    }
}
