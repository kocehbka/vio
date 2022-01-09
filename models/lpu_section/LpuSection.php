<?php

namespace app\models\lpu_section;

use app\models\BaseModel;

/**
 * This is the model class for table "lpu_section".
 *
 * @property int $id
 * @property string $name
 * @property int $created_at
 * @property int|null $updated_at
 */
class LpuSection extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lpu_section';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование отделения',
            'created_at' => 'Создано',
            'updated_at' => 'Отредактировано',
        ];
    }
}
