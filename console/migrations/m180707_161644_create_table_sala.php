<?php

use yii\db\Migration;

class m180707_161644_create_table_sala extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%sala}}', [
            'id' => $this->primaryKey(),
            'Nombre_Sala' => $this->string()->notNull()->comment('Sala'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%sala}}');
    }
}
