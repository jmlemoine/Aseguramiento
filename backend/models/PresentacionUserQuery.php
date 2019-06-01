<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[PresentacionUser]].
 *
 * @see PresentacionUser
 */
class PresentacionUserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return PresentacionUser[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return PresentacionUser|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
