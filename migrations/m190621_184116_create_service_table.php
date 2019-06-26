<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%service}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%aspiration}}`
 */
class m190621_184116_create_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%service}}', [
            'id_master' => $this->integer(11)->notNull(),
            'dinas' => $this->string(50)->notNull(),
            'jenis_layanan' => $this->string(50)->notNull(),
            'review_layanan' => $this->string(50)->notNull(),
        ]);

        $this->addPrimaryKey('id_master_pk','service','id_master');
        // creates index for column `id_master`
        $this->createIndex(
            '{{%idx-service-id_master}}',
            '{{%service}}',
            'id_master'
        );

        // add foreign key for table `{{%aspiration}}`
        $this->addForeignKey(
            '{{%fk-service-id_master}}',
            '{{%service}}',
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
            '{{%fk-service-id_master}}',
            '{{%service}}'
        );

        // drops index for column `id_master`
        $this->dropIndex(
            '{{%idx-service-id_master}}',
            '{{%service}}'
        );

        $this->dropTable('{{%service}}');
    }
}
