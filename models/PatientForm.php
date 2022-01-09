<?php

namespace app\models;

use app\models\patient\Patient;
use Yii;

class PatientForm extends \yii\base\Model
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    public $id;
    public $lastname;
    public $name;
    public $patronymic;
    public $birthday;
    public $gender;
    public $passport_seria;
    public $passport_number;
    public $passport_date;
    public $passport_issued_by;
    public $address;
    public $snils;
    public $policy_type;
    public $policy_number;

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = $scenarios[self::SCENARIO_UPDATE] = $this->attributes();
        unset($scenarios[self::SCENARIO_CREATE][array_search('id',$scenarios[self::SCENARIO_CREATE])]);

        return $scenarios;
    }

    public function savePatient()
    {
        $patient = (isset($this->id)) ? Patient::findOne(['id' => $this->id]) : new Patient();
        $patient->load(['Patient' => $this->attributes]);
        $patient->birthday = Yii::$app->formatter->asDate($patient->birthday, 'Y-MM-dd');
        $patient->passport_date = Yii::$app->formatter->asDate($patient->passport_date, 'Y-MM-dd');
        $transaction = Yii::$app->db->beginTransaction();
        if ($patient->save()) {
            if ($this->attributes['policy_type']) {
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
                    print_R($policy->getErrors()); die('asd');
                    $transaction->rollback();
                    return false;
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

    public static function findModel($patientId)
    {
        if (($patient = Patient::findOne(['id' => $patientId])) !== null) {
            $model = new self;
            $model->load($patient->attributes);
            /*if ()
            $model->*/
            return $model;
        } else {
            return null;
        }
    }


}