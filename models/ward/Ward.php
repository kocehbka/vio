<?php

namespace app\models\ward;

use Yii;

/**
 * This is the model class for table "ward".
 *
 * @property int $id
 * @property int $id_lpu_section
 * @property string $name
 * @property int $created_at
 * @property int|null $updated_at
 */
class Ward extends \yii\db\ActiveRecord
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
            [['id_lpu_section', 'name', 'created_at'], 'required'],
            [['id_lpu_section', 'created_at', 'updated_at'], 'integer'],
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
            'id_lpu_section' => 'Id Lpu Section',
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
