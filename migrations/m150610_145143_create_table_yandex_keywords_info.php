<?php

use yii\db\Schema;
use yii\db\Migration;

class m150610_145143_create_table_yandex_keywords_info extends Migration
{
   
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%yandex_keywords_info}}', [
            'd_a_k' => Schema::TYPE_INTEGER . ' NOT NULL',
            'pid_campaing' => Schema::TYPE_INTEGER . ' NOT NULL',            
            'pid_ad' => Schema::TYPE_INTEGER . ' NOT NULL',
            'pid_user' => Schema::TYPE_INTEGER . ' NOT NULL',
            'pid_phrase' => Schema::TYPE_BIGINT . ' NOT NULL',
            'sum' => Schema::TYPE_DECIMAL . ' NOT NULL',
            'clicks' => Schema::TYPE_INTEGER . ' NOT NULL',            
            'shows' => Schema::TYPE_INTEGER . ' NOT NULL',            
            'date_cr' => Schema::TYPE_DATE . ' NOT NULL'
        ], $tableOptions);
        $this->createIndex('d_a_k', '{{%yandex_keywords_info}}', 'd_a_k', true);
    }
    
    public function safeDown()
    {
        $this->dropTable('{{%yandex_keywords_info}}');
    }
}
