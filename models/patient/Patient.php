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
            'created_at' => 'Создано',
            'updated_at' => 'Отредактировано',
        ];
    }
}
