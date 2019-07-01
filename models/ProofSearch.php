<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Proof;

/**
 * ProofSearch represents the model behind the search form of `app\models\Proof`.
 */
class ProofSearch extends Proof
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_detail', 'id_master'], 'integer'],
            [['file_path_foto', 'title_foto', 'keterangan_foto'], 'safe'],
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
        $query = Proof::find();

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
            'id_detail' => $this->id_detail,
            'id_master' => $this->id_master,
        ]);

        $query->andFilterWhere(['like', 'file_path_foto', $this->file_path_foto])
            ->andFilterWhere(['like', 'title_foto', $this->title_foto])
            ->andFilterWhere(['like', 'keterangan_foto', $this->keterangan_foto]);

        return $dataProvider;
    }
}
