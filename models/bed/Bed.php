<?php

namespace app\models\bed;

use Yii;

/**
 * This is the model class for table "bed".
 *
 * @property int $id
 * @property int $id_ward
 * @property int $number
 * @property int $created_at
 * @property int|null $updated_at
 */
class Bed extends \yii\db\ActiveRecord
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
            [['id_ward', 'number', 'created_at'], 'required'],
            [['id_ward', 'number', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_ward' => 'Id Ward',
            'number' => 'Number',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
