<?php

namespace app\models;

use app\models\patient\Patient;
use Yii;

class HospitalizeForm extends \yii\base\Model
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    public $id_patient;
    public $id_bed;

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lastname' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'birthday' => 'Дата рождения',
            'gender' => 'Пол',
            'passport_seria' => 'Серия паспорта',
            'passport_number' => 'Номер паспорта',
            'passport_date' => 'Дата выдачи',
            'passport_issued_by' => 'Кем выдан',
            'address' => 'Адрес проживания',
            'snils' => 'СНИЛС',
            'policy_type' => 'Тип полиса',
            'policy_number' => 'Номер полиса',
            'created_at' => 'Создано',
            'updated_at' => 'Отредактировано',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function savePatient()
    {
        $patient = (isset($this->id)) ? Patient::findOne(['id' => $this->id]) : new Patient();
        $patient->load(['Patient' => $this->attributes]);
        $patient->birthday = Yii::$app->formatter->asDate($patient->birthday, 'Y-MM-dd');
        $patient->passport_date = Yii::$app->formatter->asDate($patient->passport_date, 'Y-MM-dd');
        $transaction = Yii::$app->db->beginTransaction();
        if ($patient->save()) {
            if ($this->attributes['policy_type']) {
                switch($this->getScenario()) {
                    case 'create':
                        $policy = new Policy();
                        $policy->policy_type = $this->policy_type;
                        $policy->number = $this->policy_number;
                        if ($policy->save()) {
                            $patientPolicy = new PatientPolicy();
                            $patientPolicy->id_patient = $patient->id;
                            $patientPolicy->id_policy = $policy->id;
                            if (!$patientPolicy->save()) {
                                $transaction->rollback();
                                return false;
                            }
                        } else {
                            $transaction->rollback();
                            return false;
                        }
                        break;
                    case 'update':
                        $policy = Policy::find()
                            ->leftJoin('patient_policy', 'patient_policy.id_policy = policy.id')
                            ->where(['patient_policy.id_patient' => $patient->id])
                            ->one();
                        $policy->policy_type = $this->policy_type;
                        $policy->number = $this->policy_number;
                        if (!$policy->save()) {
                            $transaction->rollback();
                            return false;
                        }
                        break;
                }

            }
            $transaction->commit();
            $this->id = $patient->id;
            return true;
        } else {
            print_R($patient->getErrors());
            $transaction->rollback();
            return false;
        }
    }

    public function loadDefaultValues()
    {

    }

    public static function findModel($patientId, $scenario = 'default')
    {
        if (($patient = Patient::findOne(['id' => $patientId])) !== null) {
            $model = new static;
            $model->setScenario($scenario);
            //print_R($patient->attributes);
            $model->setAttributes($patient->attributes);
            $policy = (new \yii\db\Query())
                ->select(['policy.policy_type', 'policy.number'])
                ->from('policy')
                ->leftJoin('patient_policy', 'id_policy = policy.id')
                ->where(['patient_policy.id_patient' => $patientId])
                ->one();
            if($policy) {
                $model->policy_type = $policy['policy_type'];
                $model->policy_number = $policy['number'];
            }
            return $model;
        } else {
            return null;
        }
    }


}