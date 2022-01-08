<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person_policy".
 *
 * @property int $id
 * @property int $id_person
 * @property int $id_policy
 * @property int $created_at
 * @property int|null $updated_at
 */
class PersonPolicy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person_policy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_person', 'id_policy', 'created_at'], 'required'],
            [['id_person', 'id_policy', 'created_at', 'updated_at'], 'integer'],
            [['id_policy'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_person' => 'Пациент',
            'id_policy' => 'Идентификатор полиса',
            'created_at' => 'Создано',
            'updated_at' => 'Отредактировано',
        ];
    }
}
