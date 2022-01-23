<?php

use yii\db\Migration;

/**
 * Class m220107_160021_medical_personal
 */
class m220107_160021_medical_personal extends Migration
{
    const TABLE_NAME = 'medical_personal';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'lastname' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'patronymic' => $this->string()->null(),
            'specialty' => $this->string()->notNull(),
            'auth_key' => $this->string()->notNull(),
            'access_token' => $this->string()->null(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->null()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}
