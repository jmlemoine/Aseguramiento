<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Provincia;

/**
 * backend\models\ProvinciaSearch represents the model behind the search form about `backend\models\Provincia`.
 */
 class ProvinciaSearch extends Provincia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pais_id'], 'integer'],
            [['Provincia'], 'safe'],
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
        $query = Provincia::find();

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
            'pais_id' => $this->pais_id,
        ]);

        $query->andFilterWhere(['like', 'Provincia', $this->Provincia]);

        return $dataProvider;
    }
}
