<?php

use yii\db\Migration;

class m180707_161644_create_table_congreso extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%congreso}}', [
            'id' => $this->primaryKey(),
            'provincia_id' => $this->integer(),
            'Nombre' => $this->string()->notNull()->defaultValue('100'),
            'Fecha_Inicio' => $this->dateTime()->notNull(),
            'Fecha_Final' => $this->dateTime()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-congreso-provincia_id', '{{%congreso}}', 'provincia_id');
        $this->addForeignKey('fk-congreso-provincia_id', '{{%congreso}}', 'provincia_id', '{{%provincia}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%congreso}}');
    }
}
