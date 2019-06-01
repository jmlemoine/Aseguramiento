<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[AreaEspecializacion]].
 *
 * @see AreaEspecializacion
 */
class AreaEspecializacionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return AreaEspecializacion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AreaEspecializacion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}