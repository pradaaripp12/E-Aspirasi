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
            'id_master' => $this->string(25)->notNull(),
            'tanggal' => $this->date(),
            'id_anggota' => $this->string(25),
            'id_wilayah' => $this->integer(21),
            'status' => $this->integer(1),
            'judul' => $this->string(191),
            'deskripsi' => $this->string(191),
            'tanggapan' => $this->string(191)->null(),
        ]);

        $this->addPrimaryKey('id_master_pk','aspiration','id_master');

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
