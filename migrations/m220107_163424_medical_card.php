<?php

use yii\db\Migration;

/**
 * Class m220107_163424_medical_card
 */
class m220107_163424_medical_card extends Migration
{
    const TABLE_NAME = 'medical_card';

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
            'id_patient' => $this->integer()->notNull(),
            'id_policy' => $this->integer()->null(),
            'is_pay' => $this->boolean(),
            'id_leave_base' => $this->integer()->null(),
            'diagnosis' => $this->string()->notNull(),
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
