<?php

use yii\db\Migration;

class m180707_161644_create_table_grado_academico extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%grado_academico}}', [
            'id' => $this->primaryKey(),
            'Grado' => $this->string(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%grado_academico}}');
    }
}
