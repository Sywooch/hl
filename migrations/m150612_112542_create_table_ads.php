<?php

use yii\db\Schema;
use yii\db\Migration;

class m150612_112542_create_table_ads extends Migration
{
    
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%yandex_ads}}', [
            'id' => Schema::TYPE_PK,
            'pid_campaing' => Schema::TYPE_INTEGER . ' NOT NULL',
            'pid_group_ad' => Schema::TYPE_INTEGER . ' NOT NULL', 
            'pid_user' => Schema::TYPE_INTEGER . ' NOT NULL',
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'status_show' => Schema::TYPE_SMALLINT . ' NOT NULL',
            'status_archive' => Schema::TYPE_SMALLINT . ' NOT NULL',
            'status_banner' => Schema::TYPE_SMALLINT . ' NOT NULL',
            'status_img' => Schema::TYPE_SMALLINT . ' NOT NULL',
            'status_sitelink' => Schema::TYPE_SMALLINT . ' NOT NULL',            
            'text' => Schema::TYPE_STRING . ' NOT NULL',
            'domain' => Schema::TYPE_STRING . ' NOT NULL',
            'link' => Schema::TYPE_STRING . ' NOT NULL',
            'img' => Schema::TYPE_STRING . ' NOT NULL',
            'dop_link' => Schema::TYPE_TEXT . ' NOT NULL'
        ], $tableOptions);
        $this->createIndex('name', '{{%yandex_ads}}', 'name', true);
    }
    
    public function safeDown()
    {
        $this->dropTable('{{%yandex_ads}}');
    }
}
