<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use app\assets\ModalAsset;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OdVymiruSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

ModalAsset::register($this);
$this->title = Yii::t('app', 'Od Vymirus');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="od-vymiru-index">

    <h3>Одиниці виміру</h3>
    <?php
        Modal::begin([
        'id' => 'comm',
        'header' => 'Нова одиниця виміру',
        'toggleButton' => [
            'class' => 'btn btn-success',
            'label' => 'Створити',
            'tag' => 'a',
            'data-target' => '#comm',
            'href' => \yii\helpers\Url::to(['/odvymiru/create']),
        ],
        'clientOptions' => false,
        ]);
        Modal::end();
    ?>
    <?php
    yii\bootstrap\Modal::begin([
    'id'=>'editModalId',
    'class' =>'modal',
    'size' => 'modal-md',
    ]);
    echo "<div class='modalContent'></div>";
    yii\bootstrap\Modal::end();
    ?>

    <?php Pjax::begin(['id' => 'lessons-grid-container-id']) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'=>'id',
                'value'=>'id',
                'contentOptions'=>['style'=>'width: 20px;']
            ],
            'name',
            ['class' => 'yii\grid\ActionColumn', 'template'=>'{custom_view}',
                'template' => '{edit} {view} {delete}',
                'buttons' =>[
                        'edit' => function ($url, $model) {
                        // Html::a args: title, href, tag properties.
                        return Html::a( '<span class="glyphicon glyphicon-pencil"></span>',
                            ['odvymiru/update', 'id'=>$model['id']],
                            ['class'=>'btn-xs btn-default modalButton', 'title'=>'Update', ]
                        );
                    },
                ],
                'contentOptions'=>['style'=>'width: 80px;']
            ],
        ],
    ]); ?>
    <?php Pjax::end() ?>

</div>
