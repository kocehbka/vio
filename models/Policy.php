<?php

namespace app\models;

/**
 * This is the model class for table "policy".
 *
 * @property int $id
 * @property string|null $policy_type
 * @property string $number
 * @property int $created_at
 * @property int|null $updated_at
 */
class Policy extends BaseModel
{
    const POLICY_TYPES = [
        'oms' => 'ОМС',
        'dms' => 'ДМС'
    ];

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
            ['policy_type', 'string'],
            ['number', 'required'],
            [['created_at', 'updated_at'], 'integer'],
            ['number', 'string', 'max' => 255],
            ['number', 'unique'],
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

    public static function getPolicyTypes()
    {
        return self::POLICY_TYPES;
    }
}
