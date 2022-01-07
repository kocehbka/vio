<?php

use yii\db\Migration;

/**
 * Class m220107_153029_patient
 */
class m220107_153029_patient extends Migration
{
    const TABLE_NAME = 'patient';

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
            'lastname' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'patronymic' => $this->string()->null(),
            'birthday' => $this->date()->notNull(),
            'gender' => "ENUM('male', 'female', 'undefined')",
            'passport_seria' => $this->integer()->notNull(),
            'passport_number' => $this->integer()->notNull(),
            'passport_date' => $this->date()->notNull(),
            'passport_issued_by' => $this->string()->notNull(),
            'address' => $this->string()->null(),
            'snils' => $this->string()->notNull()->unique(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->null()
        ], $tableOptions);

        $this->createIndex('m_index_passport', self::TABLE_NAME, 'passport_seria, passport_number', true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('m_index_passport', self::TABLE_NAME);
        $this->dropTable(self::TABLE_NAME);
    }
}
