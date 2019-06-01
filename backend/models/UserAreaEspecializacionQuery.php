<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[UserAreaEspecializacion]].
 *
 * @see UserAreaEspecializacion
 */
class UserAreaEspecializacionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return UserAreaEspecializacion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserAreaEspecializacion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
