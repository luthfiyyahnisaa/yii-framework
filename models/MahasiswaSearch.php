<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\mahasiswa;

/**
 * MahasiswaSearch represents the model behind the search form of `app\models\mahasiswa`.
 */
class MahasiswaSearch extends mahasiswa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_fakultas', 'id_prodi'], 'integer'],
            [['nim', 'nama', 'tgl_lahir', 'jekel', 'email', 'alamat'], 'safe'],
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
        $query = mahasiswa::find();

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
            'id' => $this->id,
            'tgl_lahir' => $this->tgl_lahir,
            'id_fakultas' => $this->id_fakultas,
            'id_prodi' => $this->id_prodi,
        ]);

        $query->andFilterWhere(['like', 'nim', $this->nim])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'jekel', $this->jekel])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'alamat', $this->alamat]);

        return $dataProvider;
    }
}
