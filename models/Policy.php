<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "policy".
 *
 * @property int $id
 * @property string|null $policy_type
 * @property string $number
 * @property int $created_at
 * @property int|null $updated_at
 */
class Policy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'policy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['policy_type'], 'string'],
            [['number', 'created_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['number'], 'string', 'max' => 255],
            [['number'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'policy_type' => 'Тип полиса',
            'number' => 'Сирия Номер/Номер',
            'created_at' => 'Создано',
            'updated_at' => 'Отредактировано',
        ];
    }
}
