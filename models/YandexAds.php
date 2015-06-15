<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "{{%yandex_ads}}".
 *
 * @property integer $id
 * @property string  $name
 * @property tinyint $status_paused
 */
class YandexAds extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yandex_ads}}';
    }  
    
    
}
