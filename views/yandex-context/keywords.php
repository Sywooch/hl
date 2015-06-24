<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\CheckboxColumn;
use app\extensions\extensionGrid;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Информация о ключевых словах';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>

    
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => "Показано {begin} - {end} из {totalCount} слов",
        'columns' => [
            'pid_phrase',
            'yandexKeywords.name:html',         
            'sum',
            'clicks',
            
            'leads.prime_cost',
            
            [
                'class' => \yii\grid\ActionColumn::className(),
                'buttons'=>[
                       'btnStopPlay'=>function ($url,$model) {
                            
                            //print_r($model);die();
        
                            if(!empty($model['yandexKeywords']['status_paused'])){                                
                                $customurl = Yii::$app->getUrlManager()->createUrl(['campaing-keywords/play/'.$model['pid_ad'].'/'.$model['pid_phrase']]); //$model->id для AR
                                $customclass = 'glyphicon glyphicon-play';
                            }
                            else{
                                $customurl = Yii::$app->getUrlManager()->createUrl(['campaing-keywords/stop/'.$model['pid_ad'].'/'.$model['pid_phrase']]); //$model->id для AR
                                $customclass = 'glyphicon glyphicon-pause';
                            } 
                           
                            
                            return \yii\helpers\Html::a( '<span class="'.$customclass.'"></span>', $customurl,
                                                     ['title' => Yii::t('yii', 'View'), 'data-pjax' => '0']);
                    }
                 ],
                'template'=>'{btnStopPlay}',
            ],
          
            
        ],
    ]); ?>

</div>