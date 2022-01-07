<?php

namespace app\models\medical_personal;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\medical_personal\MedicalPersonal;

/**
 * MedicalPersonalSearch represents the model behind the search form of `app\models\medical_personal\MedicalPersonal`.
 */
class MedicalPersonalSearch extends MedicalPersonal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'login', 'created_at', 'updated_at'], 'integer'],
            [['password', 'lastname', 'name', 'patronymic', 'specialty'], 'safe'],
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
        $query = MedicalPersonal::find();

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
            'login' => $this->login,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'specialty', $this->specialty]);

        return $dataProvider;
    }
}
