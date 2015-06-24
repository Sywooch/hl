<?php

use yii\db\Schema;
use yii\db\Migration;

class m150617_144900_create_table_leads extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%leads}}', [
            'id' => Schema::TYPE_PK,
            'order_id' => Schema::TYPE_STRING . ' NOT NULL',
            'pid_campaing' => Schema::TYPE_INTEGER . ' NOT NULL',
            'pid_ad' => Schema::TYPE_INTEGER . ' NOT NULL', 
            'pid_user' => Schema::TYPE_INTEGER . ' NOT NULL',
            'pid_phrase' => Schema::TYPE_BIGINT . ' NOT NULL',
            'status' => Schema::TYPE_INTEGER . ' NOT NULL',
            'valuta' => Schema::TYPE_STRING . ' NOT NULL',
            'sum' => Schema::TYPE_DECIMAL . ' NOT NULL',
            'sum_ru' => Schema::TYPE_DECIMAL . ' NOT NULL',
            'prime_cost' => Schema::TYPE_DECIMAL . ' NOT NULL',
            'date_cr' => Schema::TYPE_DATETIME . ' NOT NULL'
        ], $tableOptions);
        $this->createIndex('order_id', '{{%leads}}', 'order_id', true);
    }
    
    public function safeDown()
    {
        $this->dropTable('{{%leads}}');
    }
}
