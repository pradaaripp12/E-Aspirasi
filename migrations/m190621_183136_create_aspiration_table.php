<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%aspiration}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%member}}`
 * - `{{%region}}`
 */
class m190621_183136_create_aspiration_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%aspiration}}', [
            'id_master' => $this->primaryKey()->notNull(),
            'tanggal' => $this->date()->notNull(),
            'id_anggota' => $this->string(25)->notNull(),
            'id_wilayah' => $this->integer(21)->notNull(),
            'status' => $this->integer(1)->notNull(),
            'judul' => $this->string(191)->notNull(),
            'deskripsi' => $this->string(191)->notNull(),
            'tanggapan' => $this->string(191)->null(),
        ]);

        // creates index for column `id_anggota`
        $this->createIndex(
            '{{%idx-aspiration-id_anggota}}',
            '{{%aspiration}}',
            'id_anggota'
        );

        // add foreign key for table `{{%member}}`
        $this->addForeignKey(
            '{{%fk-aspiration-id_anggota}}',
            '{{%aspiration}}',
            'id_anggota',
            '{{%member}}',
            'id_anggota',
            'CASCADE'
        );

        // creates index for column `id_wilayah`
        $this->createIndex(
            '{{%idx-aspiration-id_wilayah}}',
            '{{%aspiration}}',
            'id_wilayah'
        );

        // add foreign key for table `{{%region}}`
        $this->addForeignKey(
            '{{%fk-aspiration-id_wilayah}}',
            '{{%aspiration}}',
            'id_wilayah',
            '{{%region}}',
            'id_wilayah',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%member}}`
        $this->dropForeignKey(
            '{{%fk-aspiration-id_anggota}}',
            '{{%aspiration}}'
        );

        // drops index for column `id_anggota`
        $this->dropIndex(
            '{{%idx-aspiration-id_anggota}}',
            '{{%aspiration}}'
        );

        // drops foreign key for table `{{%region}}`
        $this->dropForeignKey(
            '{{%fk-aspiration-id_wilayah}}',
            '{{%aspiration}}'
        );

        // drops index for column `id_wilayah`
        $this->dropIndex(
            '{{%idx-aspiration-id_wilayah}}',
            '{{%aspiration}}'
        );

        $this->dropTable('{{%aspiration}}');
    }
}
