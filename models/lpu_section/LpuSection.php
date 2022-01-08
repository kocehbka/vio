<?php

namespace app\models\lpu_section;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "lpu_section".
 *
 * @property int $id
 * @property string $name
 * @property int $created_at
 * @property int|null $updated_at
 */
class LpuSection extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lpu_section';
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'timestamp' => [
                    'class' => TimestampBehavior::className(),
                    'attributes' => [
                        \yii\db\BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                        \yii\db\BaseActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],

                    ]
                ]
            ]
        );
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
