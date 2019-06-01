<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\UserGradoAcademico;

/**
 * backend\models\UserGradoAcademicoSearch represents the model behind the search form about `backend\models\UserGradoAcademico`.
 */
 class UserGradoAcademicoSearch extends UserGradoAcademico
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'grado_academico_id'], 'integer'],
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
        $query = UserGradoAcademico::find();

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
            'user_id' => $this->user_id,
            'grado_academico_id' => $this->grado_academico_id,
        ]);

        return $dataProvider;
    }
}
