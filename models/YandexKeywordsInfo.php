<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "{{%yandex_keywords_info}}".
 *
 * @property string  $d_a_k
 * @property integer $pid_campaing
 * @property integer $pid_ad
 * @property integer $pid_user
 * @property integer $pid_pharse
 * @property float   $sum
 * @property integer $clicks
 * @property integer $shows
 * @property date    $date_cr
 *  
 */
class YandexKeywordsInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%yandex_keywords_info}}';
    }    
    
    public function getYandexKeywords()
    {
        return $this->hasOne(YandexKeywords::className(), ['id' => 'pid_phrase']);
    }
}
