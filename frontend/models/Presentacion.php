<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "conferencia".
 *
 *
 * @property Moderador $moderador
 */
class Presentacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'presentacion';
    }

}
