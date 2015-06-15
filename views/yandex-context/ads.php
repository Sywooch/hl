<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\CheckboxColumn;
use app\extensions\extensionGrid;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Редактор меню';
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
        'columns' => [
            'pid_campaing',
            'name',
            
        ],
    ]); ?>

</div>