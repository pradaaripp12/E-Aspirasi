<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%proof}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%aspiration}}`
 */
class m190621_183930_create_proof_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%proof}}', [
            'id_detail' => $this->primaryKey()->notNull(),
            'file_path_foto' => $this->string(191)->notNull(),
            'title_foto' => $this->string(191)->notNull(),
            'keterangan_foto' => $this->string(191),
            'id_master' => $this->integer(11)->notNull(),
        ]);
        // creates index for column `id_master`
        $this->createIndex(
            '{{%idx-proof-id_master}}',
            '{{%proof}}',
            'id_master'
        );

        // add foreign key for table `{{%aspiration}}`
        $this->addForeignKey(
            '{{%fk-proof-id_master}}',
            '{{%proof}}',
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
            '{{%fk-proof-id_master}}',
            '{{%proof}}'
        );

        // drops index for column `id_master`
        $this->dropIndex(
            '{{%idx-proof-id_master}}',
            '{{%proof}}'
        );

        $this->dropTable('{{%proof}}');
    }
}
