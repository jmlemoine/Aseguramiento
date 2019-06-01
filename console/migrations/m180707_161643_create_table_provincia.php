<?php

use yii\db\Migration;

class m180707_161643_create_table_provincia extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%provincia}}', [
            'id' => $this->primaryKey(),
            'pais_id' => $this->integer()->notNull(),
            'Provincia' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-provincia-pais_id', '{{%provincia}}', 'pais_id');
        $this->addForeignKey('fk-provincia-pais_id', '{{%provincia}}', 'pais_id', '{{%pais}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%provincia}}');
    }
}
