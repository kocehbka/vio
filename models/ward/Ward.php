<?php

namespace app\models\ward;

use app\models\lpu_section\LpuSection;
use Yii;
use yii\behaviors\TimestampBehavior;

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
