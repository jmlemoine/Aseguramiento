<?php

use yii\db\Migration;

class m180707_161645_create_table_presentacion_user extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%presentacion_user}}', [
            'presentacion_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addPrimaryKey('PRIMARYKEY', '{{%presentacion_user}}', ['presentacion_id', 'user_id']);
        $this->createIndex('idx-presentacion_user-presentacion_id', '{{%presentacion_user}}', 'presentacion_id');
        $this->createIndex('idx-presentacion_user-user_id', '{{%presentacion_user}}', 'user_id');
        $this->addForeignKey('fk-presentacion_user-presentacion_id', '{{%presentacion_user}}', 'presentacion_id', '{{%presentacion}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-presentacion_user-user_id', '{{%presentacion_user}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%presentacion_user}}');
    }
}
