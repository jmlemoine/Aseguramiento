<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Afiliacion]].
 *
 * @see Afiliacion
 */
class AfiliacionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Afiliacion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Afiliacion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}