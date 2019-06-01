<?php

use yii\db\Migration;

class m180707_161646_create_table_user_area_especializacion extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_area_especializacion}}', [
            'user_id' => $this->integer()->notNull(),
            'area_especializacion_id' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addPrimaryKey('PRIMARYKEY', '{{%user_area_especializacion}}', ['user_id', 'area_especializacion_id']);
        $this->createIndex('idx-user_area_especializacion-user_id', '{{%user_area_especializacion}}', 'user_id');
        $this->createIndex('idx-user_area_especializacion-area_especializacion_id', '{{%user_area_especializacion}}', 'area_especializacion_id');
        $this->addForeignKey('fk-user_area_especializacion-area_especializacion_id', '{{%user_area_especializacion}}', 'area_especializacion_id', '{{%area_especializacion}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-user_area_especializacion-user_id', '{{%user_area_especializacion}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%user_area_especializacion}}');
    }
}
