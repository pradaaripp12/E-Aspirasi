<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SecurityProblem;

/**
 * SecurityProblemSearch represents the model behind the search form of `app\models\SecurityProblem`.
 */
class SecurityProblemSearch extends SecurityProblem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_master'], 'integer'],
            [['jenis_kejahatan'], 'safe'],
            [['longtitude', 'latitude'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = SecurityProblem::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_master' => $this->id_master,
            'longtitude' => $this->longtitude,
            'latitude' => $this->latitude,
        ]);

        $query->andFilterWhere(['like', 'jenis_kejahatan', $this->jenis_kejahatan]);

        return $dataProvider;
    }
}
