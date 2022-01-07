<?php

namespace app\models\patient;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\patient\Patient;

/**
 * PatientSearch represents the model behind the search form of `app\models\patient\Patient`.
 */
class PatientSearch extends Patient
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'passport_seria', 'passport_number', 'created_at', 'updated_at'], 'integer'],
            [['lastname', 'name', 'patronymic', 'birthday', 'gender', 'passport_date', 'passport_issued_by', 'address', 'snils'], 'safe'],
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
        $query = Patient::find();

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
            'birthday' => $this->birthday,
            'passport_seria' => $this->passport_seria,
            'passport_number' => $this->passport_number,
            'passport_date' => $this->passport_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'passport_issued_by', $this->passport_issued_by])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'snils', $this->snils]);

        return $dataProvider;
    }
}
