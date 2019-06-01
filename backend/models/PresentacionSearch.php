<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Presentacion;

/**
 * backend\models\PresentacionSearch represents the model behind the search form about `backend\models\Presentacion`.
 */
 class PresentacionSearch extends Presentacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'congreso_id', 'sala_id', 'estado_id'], 'integer'],
            [['Titulo', 'Institucion', 'Area_Tematica', 'Modalidad_Presentacion', 'Fecha_Inicio', 'Fecha_Final', 'Vinculo', 'Archivo', 'Descripcion'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Presentacion::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'congreso_id' => $this->congreso_id,
            'sala_id' => $this->sala_id,
            'Fecha_Inicio' => $this->Fecha_Inicio,
            'Fecha_Final' => $this->Fecha_Final,
            'estado_id' => $this->estado_id, 
        ]);

        $query->andFilterWhere(['like', 'Titulo', $this->Titulo])
            ->andFilterWhere(['like', 'Institucion', $this->Institucion])
            ->andFilterWhere(['like', 'Area_Tematica', $this->Area_Tematica])
            ->andFilterWhere(['like', 'Modalidad_Presentacion', $this->Modalidad_Presentacion])
            ->andFilterWhere(['like', 'Vinculo', $this->Vinculo])
            ->andFilterWhere(['like', 'Archivo', $this->Archivo])
            //->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
