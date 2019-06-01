<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Congreso]].
 *
 * @see Congreso
 */
class CongresoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Congreso[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Congreso|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}