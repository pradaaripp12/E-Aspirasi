<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%anggota}}`.
 */
class m190621_165341_create_anggota_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%anggota}}', [
            'id_anggota' => $this->string(25)->notNull(),
            'password' => $this->string(191),
            'nama' => $this->string(100),
            'alamat' => $this->string(191),
            'no_hp' => $this->char(13),
            'jenis_kelamin' => "ENUM('L','P')",
            'is_admin' => $this->integer(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%anggota}}');
    }
}
