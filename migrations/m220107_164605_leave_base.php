<?php

use yii\db\Migration;

/**
 * Class m220107_164605_leave_base
 */
class m220107_164605_leave_base extends Migration
{
    const TABLE_NAME = 'leave_base';

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
            'id_leave_base_reason' => $this->integer()->notNull(),
            'id_lpu_section' => $this->integer()->notNull(),
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
