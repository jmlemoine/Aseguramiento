<?php

use yii\db\Migration;

class m180709_171051_update_table_user extends Migration
{
    public function up()
    {
        $this->addColumn('user','Descripcion', $this->text()->after('Fecha_Nacimiento'));
       
    }

    public function down()
    {
        echo "m180709_171051_update_table_user cannot be reverted.\n";
        return false;
    }
}
