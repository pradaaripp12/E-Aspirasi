<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%security_problem}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%aspiration}}`
 */
class m190621_184326_create_security_problem_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%security_problem}}', [
            'id_master' => $this->string(25)->notNull(),
            'jenis_kejahatan' => $this->string(191)->notNull(),
            'longtitude' => $this->decimal(10,7)->notNull(),
            'latitude' => $this->decimal(10,7)->notNull(),
        ]);

        $this->addPrimaryKey('id_master_pk','security_problem','id_master');
        // creates index for column `id_master`
        $this->createIndex(
            '{{%idx-security_problem-id_master}}',
            '{{%security_problem}}',
            'id_master'
        );

        // add foreign key for table `{{%aspiration}}`
        $this->addForeignKey(
            '{{%fk-security_problem-id_master}}',
            '{{%security_problem}}',
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
            '{{%fk-security_problem-id_master}}',
            '{{%security_problem}}'
        );

        // drops index for column `id_master`
        $this->dropIndex(
            '{{%idx-security_problem-id_master}}',
            '{{%security_problem}}'
        );

        $this->dropTable('{{%security_problem}}');
    }
}
