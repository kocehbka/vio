<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;

class BaseModel extends ActiveRecord
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'timestamp' => [
                    'class' => TimestampBehavior::className(),
                    'attributes' => [
                        BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                        BaseActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                    ]
                ]
            ]
        );
    }
}