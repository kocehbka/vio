<?php

namespace app\models\patient;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property int $id
 * @property string $lastname
 * @property string $name
 * @property string|null $patronymic
 * @property string $birthday
 * @property string|null $gender
 * @property int $passport_seria
 * @property int $passport_number
 * @property string $passport_date
 * @property string $passport_issued_by
 * @property string|null $address
 * @property string $snils
 * @property int $created_at
 * @property int|null $updated_at
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lastname', 'name', 'birthday', 'passport_seria', 'passport_number', 'passport_date', 'passport_issued_by', 'snils', 'created_at'], 'required'],
            [['birthday', 'passport_date'], 'safe'],
            [['gender'], 'string'],
            [['passport_seria', 'passport_number', 'created_at', 'updated_at'], 'integer'],
            [['lastname', 'name', 'patronymic', 'passport_issued_by', 'address', 'snils'], 'string', 'max' => 255],
            [['snils'], 'unique'],
            [['passport_seria', 'passport_number'], 'unique', 'targetAttribute' => ['passport_seria', 'passport_number']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lastname' => 'Lastname',
            'name' => 'Name',
            'patronymic' => 'Patronymic',
            'birthday' => 'Birthday',
            'gender' => 'Gender',
            'passport_seria' => 'Passport Seria',
            'passport_number' => 'Passport Number',
            'passport_date' => 'Passport Date',
            'passport_issued_by' => 'Passport Issued By',
            'address' => 'Address',
            'snils' => 'Snils',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
