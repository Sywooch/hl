<?php

use yii\db\Schema;
use yii\db\Migration;

class m150610_121920_create_table_yandex_keywords extends Migration
{
    
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%yandex_keywords}}', [
            'id' => Schema::TYPE_PK,
            'id_user' => Schema::TYPE_INTEGER . ' NOT NULL',
            'name' => Schema::TYPE_STRING . ' NOT NULL',          
            'status_paused' => Schema::TYPE_SMALLINT . ' NOT NULL'
        ], $tableOptions);
        $this->createIndex('name', '{{%yandex_keywords}}', 'name', true);
    }
    
    public function safeDown()
    {
        $this->dropTable('{{%yandex_keywords}}');
    }
}
