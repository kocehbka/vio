<?php

namespace app\models\bed;

use app\models\BaseModel;
use app\models\ward\Ward;

/**
 * This is the model class for table "bed".
 *
 * @property int $id
 * @property int $id_ward
 * @property int $number
 * @property int $created_at
 * @property int|null $updated_at
 */
class Bed extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bed';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ward', 'number'], 'required'],
            [['id_ward', 'number', 'created_at', 'updated_at'], 'integer'],
        ];
    }


    public function getWard()
    {
        return $this->hasOne(Ward::class, ['id' => 'id_ward']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_ward' => 'Идентификатор палаты',
            'number' => 'Номер палаты',
            'created_at' => 'Создано',
            'updated_at' => 'Отредактировано',
        ];
    }
}
