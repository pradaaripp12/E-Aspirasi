<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Aspiration;

/**
 * AspirationSearch represents the model behind the search form of `app\models\Aspiration`.
 */
class AspirationSearch extends Aspiration
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_master', 'tanggal', 'id_anggota', 'judul', 'deskripsi', 'tanggapan'], 'safe'],
            [['id_wilayah', 'status'], 'integer'],
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
        $query = Aspiration::find();

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
            'tanggal' => $this->tanggal,
            'id_wilayah' => $this->id_wilayah,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'id_master', $this->id_master])
            ->andFilterWhere(['like', 'id_anggota', $this->id_anggota])
            ->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'tanggapan', $this->tanggapan]);

        return $dataProvider;
    }
}
