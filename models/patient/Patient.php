<?php

namespace app\models\patient;

use app\models\BaseModel;
use app\models\MedicalCard;
use app\models\PatientPolicy;

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
class Patient extends BaseModel
{
    const PATIENT_GENDERS = [
        'male' => 'Мужской',
        'female' => 'Женский',
        'undefined' => 'Неопределённый'
    ];

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
            [['lastname', 'name', 'birthday', 'passport_seria', 'passport_number', 'passport_date', 'passport_issued_by', 'snils'], 'required'],
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

    public function getMedicalCard()
    {
        return $this->hasMany(MedicalCard::class, ['id_patient' => 'id']);
    }

    public function getActiveMedicalCard()
    {
        return $this->hasMany(MedicalCard::class, ['id_patient' => 'id'])->where(['id_leave_base' => null]);
    }

    public function getBed()
    {
        return $this->hasOne(Bed::class, ['id_patient' => 'id', 'is_leave_base' => 0]);
    }

    public static function getPatientGenders()
    {
        return self::PATIENT_GENDERS;
    }
}
