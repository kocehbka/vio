<?php

namespace app\models\ward;

use app\models\BaseModel;
use app\models\lpu_section\LpuSection;

/**
 * This is the model class for table "ward".
 *
 * @property int $id
 * @property int $id_lpu_section
 * @property string $name
 * @property int $created_at
 * @property int|null $updated_at
 */
class Ward extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ward';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_lpu_section', 'name'], 'required'],
            [['id_lpu_section', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function getLpuSection()
    {
        return $this->hasOne(LpuSection::class, ['id' => 'id_lpu_section']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_lpu_section' => 'ID отделения',
            'name' => 'Номер',
            'created_at' => 'Создано',
            'updated_at' => 'Отредактировано',
        ];
    }
}
