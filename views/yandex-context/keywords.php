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
        'columns' => [
            'pid_phrase',
            'yandexKeywords.name:html',         
            'sum',
            'clicks',
            
        ],
    ]); ?>

</div>