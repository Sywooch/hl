<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "{{%yandex_keywords}}".
 *
 * @property integer $id
 * @property string  $order_id
 * @property integer $pid_campaing
 * @property integer $pid_ad
 * @property integer $pid_user
 * @property integer $pid_pharse
 * @property integer $status
 * @property string  $valuta
 * @property float   $sum
 * @property float   $sum_ru
 * @property float   $prime_cost
 * @property date    $date_cr
 */
class Leads extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%leads}}';
    }    
}
