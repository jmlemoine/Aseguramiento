<?php

use yii\db\Migration;

class m180707_161641_create_table_afiliacion extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%afiliacion}}', [
            'id' => $this->primaryKey(),
            'Afiliacion' => $this->string(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%afiliacion}}');
    }
}
