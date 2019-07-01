<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Infrastructure;

/**
 * InfrastructureSearch represents the model behind the search form of `app\models\Infrastructure`.
 */
class InfrastructureSearch extends Infrastructure
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_master'], 'integer'],
            [['longtitude', 'latitude'], 'number'],
            [['status_infrastruktur', 'jenis_infrastruktur'], 'safe'],
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
        $query = Infrastructure::find();

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

        $query->andFilterWhere(['like', 'status_infrastruktur', $this->status_infrastruktur])
            ->andFilterWhere(['like', 'jenis_infrastruktur', $this->jenis_infrastruktur]);

        return $dataProvider;
    }
}
