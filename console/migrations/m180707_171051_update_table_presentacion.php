<?php

use yii\db\Migration;

class m180707_171051_update_table_presentacion extends Migration
{
    public function up()
    {
        $this->createIndex('idx-presentacion-congreso_id', '{{%presentacion}}', 'congreso_id');
    }

    public function down()
    {
        echo "m180707_171051_update_table_presentacion cannot be reverted.\n";
        return false;
    }
}
