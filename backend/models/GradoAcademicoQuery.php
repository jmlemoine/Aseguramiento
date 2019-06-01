<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[GradoAcademico]].
 *
 * @see GradoAcademico
 */
class GradoAcademicoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return GradoAcademico[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return GradoAcademico|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}