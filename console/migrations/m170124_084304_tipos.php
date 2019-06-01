<?php
use yii\db\Migration;

class m170124_084304_tipos extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;

        $rule = new \backend\rbac\UserGroupRule;
        $auth->add($rule);

        $participante = $auth->createRole('participante');
        $participante->ruleName = $rule->name;
        $auth->add($participante);

        $presentador = $auth->createRole('presentador');
        $presentador->ruleName = $rule->name;
        $auth->add($presentador);

        $moderador = $auth->createRole('moderador');
        $moderador->ruleName = $rule->name;
        $auth->add($moderador);
        $auth->addChild($moderador, $presentador);
        // ... add permissions as children of $moderador ...

        $admin = $auth->createRole('admin');
        $admin->ruleName = $rule->name;
        $auth->add($admin);
        $auth->addChild($admin, $moderador);
        $auth->addChild($admin, $participante);
        // ... add permissions as children of $admin ...    
        

    }
    
    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }
}