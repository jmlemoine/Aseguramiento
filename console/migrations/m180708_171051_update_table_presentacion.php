<?php

use yii\db\Migration;

class m180708_171051_update_table_presentacion extends Migration
{
    public function up()
    {
        $this->addColumn('presentacion', 'Descripcion', $this->text()->after('filename'));
        $this->addColumn('presentacion', 'estado_id', $this->integer()->notNull()->defaultValue('1'));
        $this->addForeignKey('fk-presentacion-estado_id', '{{%presentacion}}', 'estado_id', '{{%estado}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        echo "m180708_171051_update_table_presentacion cannot be reverted.\n";
        return false;
    }
}
