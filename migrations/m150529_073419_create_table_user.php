<?php

use yii\db\Schema;
use yii\db\Migration;

class m150529_073419_create_table_user extends Migration
{   
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'login' => Schema::TYPE_STRING . ' NOT NULL',
            'password' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . ' NOT NULL',
            'token' => Schema::TYPE_STRING . ' NOT NULL',
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'en' => Schema::TYPE_SMALLINT . ' NOT NULL'
        ], $tableOptions);
        $this->createIndex('login', '{{%user}}', 'login', true);
        
        $this->execute($this->addUserSql());
    }
    
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
    
    private function addUserSql()
    {
        $password = Yii::$app->security->generatePasswordHash('123456');
        $auth_key = Yii::$app->security->generateRandomString();
        $token = Yii::$app->security->generateRandomString() . '_' . time();
        return "INSERT INTO {{%user}} (`login`, `password`, `auth_key`, `token`,`email`, `en` ) VALUES ('superadmin', '$password', '$auth_key', '$token','alexkamenskiy@mail.ru', '1')";
    }
}
