<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%member}}`.
 */
class m190621_183042_create_member_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%member}}', [
            'id_anggota' => $this->string(25)->notNull(),
            'password' => $this->string(191)->notNull(),
            'nama' => $this->string(191)->notNull(),
            'alamat' => $this->string(191)->notNull(),
            'no_hp' => $this->char(13)->notNull(),
            'jenis_kelamin' => "ENUM('L','P')",
            'is_admin' => $this->integer(1)->notNull(),
        ]);

        $this->addPrimaryKey('id_anggota_pk','member','id_anggota');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%member}}');
    }
}
