<?php
use yii\db\Migration;

class m170125_084304_moderador extends Migration
{
    public function up()
    {
        $auth = Yii::$app->authManager;

        // add the rule
        $rule = new \backend\rbac\ModeradorRule;
        $auth->add($rule);

        // add "createPost" permission
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // add "updatePost" permission
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);
        //$authorRole = $auth->getRole('author');
        $moderador = $auth->getRole('moderador');
        //$moderador = $auth->createRole('moderador');
        //$auth->add($moderador);
        $auth->addChild($moderador, $createPost);

        // add the "updateOwnPost" permission and associate the rule with it.
        $updateOwnPost = $auth->createPermission('updateOwnPost');
        $updateOwnPost->description = 'Update own post';
        $updateOwnPost->ruleName = $rule->name;
        $auth->add($updateOwnPost);

        // "updateOwnPost" will be used from "updatePost"
        $auth->addChild($updateOwnPost, $updatePost);

        // allow "moderador" to update their own posts
        $auth->addChild($moderador, $updateOwnPost);   

    }
    
    public function down()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();
    }
}