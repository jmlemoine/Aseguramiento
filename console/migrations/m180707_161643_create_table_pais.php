<?php

use yii\db\Migration;

class m180707_161643_create_table_pais extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%pais}}', [
            'id' => $this->primaryKey(),
            'Pais' => $this->string()->notNull()->defaultValue('República Dominicana'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%pais}}');
    }
}
