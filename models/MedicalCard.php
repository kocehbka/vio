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
            'id_patient' => 'Пациент',
            'id_policy' => 'Полис пациента',
            'is_pay' => 'Платные услуги',
            'id_leave_base' => 'Выписан',
            'diagnosis' => 'Диагноз',
            'created_at' => 'Создано',
            'updated_at' => 'Отредактировано',
        ];
    }
}
