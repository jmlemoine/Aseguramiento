<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Congreso;

/**
 * backend\models\CongresoSearch represents the model behind the search form about `backend\models\Congreso`.
 */
 class CongresoSearch extends Congreso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'provincia_id'], 'integer'],
            [['Nombre', 'Fecha_Inicio', 'Fecha_Final'], 'safe'],
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
        $query = Congreso::find();

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
            'provincia_id' => $this->provincia_id,
            'Fecha_Inicio' => $this->Fecha_Inicio,
            'Fecha_Final' => $this->Fecha_Final,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre]);

        return $dataProvider;
    }
}
