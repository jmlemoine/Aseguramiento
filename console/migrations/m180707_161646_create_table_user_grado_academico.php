<?php

use yii\db\Migration;

class m180707_161646_create_table_user_grado_academico extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_grado_academico}}', [
            'user_id' => $this->integer()->notNull(),
            'grado_academico_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addPrimaryKey('PRIMARYKEY', '{{%user_grado_academico}}', ['user_id', 'grado_academico_id']);
        $this->createIndex('idx-user_grado_academico-user_id', '{{%user_grado_academico}}', 'user_id');
        $this->createIndex('idx-user_grado_academico-grado_academico_id', '{{%user_grado_academico}}', 'grado_academico_id');
        $this->addForeignKey('fk-user_grado_academico-grado_academico_id', '{{%user_grado_academico}}', 'grado_academico_id', '{{%grado_academico}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-user_grado_academico-user_id', '{{%user_grado_academico}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%user_grado_academico}}');
    }
}
