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

    <p>
        <?= Html::a('Create Menu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
             
            'id',
            'name',
            'link',
            [
                'attribute' => 'en',
                'format' => 'raw',
                'value' => function ($model, $index, $widget) {
                    return Html::checkbox('en[]', $model->en, ['value' => $index, 'disabled' => true]);
                },
            ],
                
            ['class' => 'app\extensions\extensionGrid\ActionSort'],
                        
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>