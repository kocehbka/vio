<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "leave_base".
 *
 * @property int $id
 * @property int $id_patient
 * @property int $id_leave_base_reason
 * @property int $id_lpu_section
 * @property int $created_at
 * @property int|null $updated_at
 */
class LeaveBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leave_base';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_patient', 'id_leave_base_reason', 'id_lpu_section', 'created_at'], 'required'],
            [['id_patient', 'id_leave_base_reason', 'id_lpu_section', 'created_at', 'updated_at'], 'integer'],
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
            'id_leave_base_reason' => 'Id Leave Base Reason',
            'id_lpu_section' => 'Id Lpu Section',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
