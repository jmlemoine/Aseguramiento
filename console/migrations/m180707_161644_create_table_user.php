<?php

use yii\db\Migration;

class m180707_161644_create_table_user extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'Nombre' => $this->string()->notNull(),
            'Apellido' => $this->string()->notNull(),
            'afiliacion_id' => $this->integer(),
            'tipo_user_id' => $this->integer(),
            'pais_id' => $this->integer(),
            'username' => $this->string()->notNull()->comment('Usuario'),
            'email' => $this->string(),
            'Telefono' => $this->string(),
            'Sexo' => $this->string()->notNull()->defaultValue('Masculino'),
            'Fecha_Nacimiento' => $this->date()->notNull(),
            'Foto' => $this->binary()->comment('perfil'),
            'filename' => $this->string(),
            'password_hash' => $this->string()->notNull()->comment('contrasena'),
            'password_reset_token' => $this->string(),
            'status' => $this->smallInteger()->notNull()->defaultValue('10')->comment('estado'),
            'auth_key' => $this->string()->notNull(),
            'created_at' => $this->integer()->comment('creado el'),
            'updated_at' => $this->integer()->comment('actualizado el'),
        ], $tableOptions);

        $this->createIndex('idx-user-afiliacion_id', '{{%user}}', 'afiliacion_id');
        $this->createIndex('idx-user-tipo_user_id', '{{%user}}', 'tipo_user_id');
        $this->createIndex('email', '{{%user}}', 'email', true);
        $this->addForeignKey('fk-user-afiliacion_id', '{{%user}}', 'afiliacion_id', '{{%afiliacion}}', 'id', 'SET NULL', 'RESTRICT');
        $this->addForeignKey('fk-user-pais_id', '{{%user}}', 'pais_id', '{{%pais}}', 'id', 'CASCADE', 'RESTRICT');
        $this->addForeignKey('fk-user-tipo_user_id', '{{%user}}', 'tipo_user_id', '{{%tipo_user}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
