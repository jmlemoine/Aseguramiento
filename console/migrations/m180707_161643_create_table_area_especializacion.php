<?php

use yii\db\Migration;

class m180707_161643_create_table_area_especializacion extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%area_especializacion}}', [
            'id' => $this->primaryKey(),
            'area' => $this->string()->notNull()->comment('Area de especializacion'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%area_especializacion}}');
    }
}
