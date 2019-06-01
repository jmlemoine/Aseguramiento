<?php

namespace backend\models;

use Yii;
use \backend\models\base\Presentacion as BasePresentacion;

/**
 * This is the model class for table "presentacion".
 */
class Presentacion extends BasePresentacion
{

    /**
    * @var mixed image the attribute for rendering the file input
    * widget for upload on the form
    */
    public $image;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['congreso_id', 'Titulo', 'Fecha_Inicio', 'Fecha_Final'], 'required'],
            [['congreso_id', 'sala_id', 'estado_id', 'Fecha_Inicio_Real', 'Fecha_Final_Real'], 'integer'],
            [['Fecha_Inicio', 'Fecha_Final', 'Fecha_Inicio_Real', 'Fecha_Final_Real'], 'safe'],
            [['image'], 'safe'],
            [['image'], 'file'],
            [['Descripcion'], 'string'],
            [['Titulo', 'Area_Tematica'], 'string', 'max' => 100],
            [['Institucion'], 'string', 'max' => 50],
            [['Modalidad_Presentacion'], 'string', 'max' => 20],
            [['Vinculo'], 'string', 'max' => 255]
        ]);
    }
	
}
