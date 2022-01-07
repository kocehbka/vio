<?php

use yii\db\Migration;

/**
 * Class m220107_163855_leave_base_reason
 */
class m220107_163855_leave_base_reason extends Migration
{
    const TABLE_NAME = 'leave_base_reason';

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
            'name' => $this->string()->notNull()
        ], $tableOptions);

        $this->batchInsert(
            self::TABLE_NAME,
            ['name'],
            [
                ['Выписан'],
                ['Умер'],
                ['Переведён в другое ЛПУ'],
                ['Переведён в другое отеделние']
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}
