<?php

namespace app\models\medical_personal;

use Yii;

/**
 * This is the model class for table "medical_personal".
 *
 * @property int $id
 * @property int $login
 * @property string $password
 * @property string $lastname
 * @property string $name
 * @property string|null $patronymic
 * @property string $specialty
 * @property int $created_at
 * @property int|null $updated_at
 */
class MedicalPersonal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medical_personal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'lastname', 'name', 'specialty', 'created_at'], 'required'],
            [['login', 'created_at', 'updated_at'], 'integer'],
            [['password', 'lastname', 'name', 'patronymic', 'specialty'], 'string', 'max' => 255],
            [['login'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'password' => 'Пароль',
            'lastname' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'specialty' => 'Специальность врача',
            'created_at' => 'Создано',
            'updated_at' => 'Отредактировано',
        ];
    }
}
