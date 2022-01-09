<?php

namespace app\models;

/**
 * This is the model class for table "patient_policy".
 *
 * @property int $id
 * @property int $id_patient
 * @property int $id_policy
 * @property int $created_at
 * @property int|null $updated_at
 */
class PatientPolicy extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patient_policy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_patient', 'id_policy'], 'required'],
            [['id_patient', 'id_policy', 'created_at', 'updated_at'], 'integer'],
            ['id_policy', 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_patient' => 'Пациент',
            'id_policy' => 'Идентификатор полиса',
            'created_at' => 'Создано',
            'updated_at' => 'Отредактировано',
        ];
    }
}
