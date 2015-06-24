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
    
    public function getLeads(){        
        
        $info_order = $this->hasOne(Leads::ClassName(), ['pid_phrase' =>  'pid_phrase'])
                //->select('(SUM(sum_ru)-SUM(prime_cost)) as prime_cost')
                ->select('SUM(prime_cost) as prime_cost')
                ->where(['between', 'date_cr', Yii::$app->session['dateFrom'], Yii::$app->session['dateTo']]);
        
        print_r($info_order);
        die();
        return $info_order;
    }
    
    
    public function attributeLabels() {
        return [
            'pid_phrase'=> Yii::t('app', '№ слова'),
            'yandexKeywords.name'=> Yii::t('app', 'Ключевое слово'),
            'sum'       => Yii::t('app', 'Сумма'),
            'clicks'    => Yii::t('app', 'Клики'),
            'leads.dirty_prime_cost'=> Yii::t('app', 'Грязная прибыль'),
        ];
    }
}
