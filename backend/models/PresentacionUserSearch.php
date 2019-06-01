<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PresentacionUser;

/**
 * backend\models\PresentacionUserSearch represents the model behind the search form about `backend\models\PresentacionUser`.
 */
 class PresentacionUserSearch extends PresentacionUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['presentacion_id', 'user_id'], 'integer'],
            [['estado_notificacion'], 'safe'],
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
        $query = PresentacionUser::find();

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
            'presentacion_id' => $this->presentacion_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'estado_notificacion', $this->estado_notificacion]);

        return $dataProvider;
    }
}
