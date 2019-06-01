<?php

use yii\db\Migration;

class m180707_161645_create_table_presentacion extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%presentacion}}', [
            'id' => $this->primaryKey(),
            'congreso_id' => $this->integer()->notNull(),
            'sala_id' => $this->integer()->notNull(),
            'Titulo' => $this->string()->notNull(),
            'Institucion' => $this->string(),
            'Area_Tematica' => $this->string(),
            'Modalidad_Presentacion' => $this->string(),
            'Fecha_Inicio' => $this->dateTime()->notNull(),
            'Fecha_Final' => $this->dateTime()->notNull(),
            'Vinculo' => $this->string(),
            'Archivo' => $this->binary(),
            'filename' => $this->string(),
        ], $tableOptions);

        $this->createIndex('idx-presentacion-sala_id', '{{%presentacion}}', 'sala_id');
        $this->addForeignKey('fk-presentacion-sala_id', '{{%presentacion}}', 'sala_id', '{{%sala}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('idx-presentacion-congreso_id', '{{%presentacion}}', 'congreso_id', '{{%congreso}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%presentacion}}');
    }
}
