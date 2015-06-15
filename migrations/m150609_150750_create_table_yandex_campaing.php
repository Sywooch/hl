<?php

use yii\db\Schema;
use yii\db\Migration;

class m150609_150750_create_table_yandex_campaing extends Migration
{
    
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%yandex_campaings}}', [
            'id' => Schema::TYPE_PK,
            'id_user' => Schema::TYPE_INTEGER . ' NOT NULL',
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'strategy' => Schema::TYPE_STRING . ' NOT NULL',
            'strategy_context' => Schema::TYPE_STRING . ' NOT NULL',
            'status' => Schema::TYPE_STRING . ' NOT NULL',
            'currency' => Schema::TYPE_STRING . ' NOT NULL',
            'date_cr' => Schema::TYPE_DATE . ' NOT NULL',
            'date_ad_up' => Schema::TYPE_DATE . ' NOT NULL',            
            'collect_info' => Schema::TYPE_SMALLINT . ' NOT NULL'
        ], $tableOptions);
        $this->createIndex('name', '{{%yandex_campaings}}', 'name', true);
    }
    
    public function safeDown()
    {
        $this->dropTable('{{%yandex_campaings}}');
    }
    
}
