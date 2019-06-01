<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[UserGradoAcademico]].
 *
 * @see UserGradoAcademico
 */
class UserGradoAcademicoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return UserGradoAcademico[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserGradoAcademico|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
