<?php

use yii\db\Migration;

class m180707_232104_create_table_estado extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%estado}}', [
            'id' => $this->primaryKey(),
            'Estado' => $this->string()->notNull(),
        ], $tableOptions);

        $this->insert('estado',array(
            'Estado'=>'En espera',
        ));

        $this->insert('estado',array(
            'Estado'=>'Activo',
        ));

        $this->insert('estado',array(
            'Estado'=>'Terminado',
        ));

    }

    public function down()
    {
        $this->dropTable('{{%estado}}');
    }
}
