<?php

namespace app\models\medical_personal;

use app\models\BaseModel;
use Yii;

/**
 * This is the model class for table "medical_personal".
 *
 * @property int $id
 * @property int $username
 * @property string $password
 * @property string $lastname
 * @property string $name
 * @property string|null $patronymic
 * @property string $specialty
 * @property string $auth_key
 * @property int $created_at
 * @property int|null $updated_at
 */
class MedicalPersonal extends BaseModel implements \yii\web\IdentityInterface
{
    public $authKey;
    public $accessToken;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medical_personal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'lastname', 'name', 'specialty'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['password', 'lastname', 'name', 'patronymic', 'specialty'], 'string', 'max' => 255],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Логин',
            'password' => 'Пароль',
            'lastname' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'specialty' => 'Специальность врача',
            'created_at' => 'Создано',
            'updated_at' => 'Отредактировано',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->auth_key = Yii::$app->security->generateRandomString();
                $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            }
            return true;
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id) ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]) ?? null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
     static function findByUsername($username)
    {
        return static::findOne(['username' => $username]) ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        $this->authKey = $this->auth_key;
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }
}
