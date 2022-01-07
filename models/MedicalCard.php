<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medical_card".
 *
 * @property int $id
 * @property int $id_patient
 * @property int|null $id_policy
 * @property int|null $is_pay
 * @property int|null $id_leave_base
 * @property string $diagnosis
 * @property int $created_at
 * @property int|null $updated_at
 */
class MedicalCard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medical_card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_patient', 'diagnosis', 'created_at'], 'required'],
            [['id_patient', 'id_policy', 'is_pay', 'id_leave_base', 'created_at', 'updated_at'], 'integer'],
            [['diagnosis'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_patient' => 'Id Patient',
            'id_policy' => 'Id Policy',
            'is_pay' => 'Is Pay',
            'id_leave_base' => 'Id Leave Base',
            'diagnosis' => 'Diagnosis',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
