<?php

use yii\db\Migration;

class m180707_161646_create_table_user_sala extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_sala}}', [
            'user_id' => $this->integer()->notNull(),
            'sala_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addPrimaryKey('PRIMARYKEY', '{{%user_sala}}', ['user_id', 'sala_id']);
        $this->createIndex('idx-user_sala-user_id', '{{%user_sala}}', 'user_id');
        $this->createIndex('idx-user_sala-sala_id', '{{%user_sala}}', 'sala_id');
        $this->addForeignKey('fk-user_sala-sala_id', '{{%user_sala}}', 'sala_id', '{{%sala}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-user_sala-user_id', '{{%user_sala}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%user_sala}}');
    }
}
