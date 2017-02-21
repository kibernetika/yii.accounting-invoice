<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\OdVymiru;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use app\assets\ModalAsset;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TovarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
ModalAsset::register($this);
$this->title = 'Tovars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tovar-index">

    <h3>Товари</h3>
    <?php
    Modal::begin([
        'id' => 'comm',
        'header' => 'Новий товар',
        'toggleButton' => [
            'class' => 'btn btn-success',
            'label' => 'Створити',
            'tag' => 'a',
            'data-target' => '#comm',
            'href' => \yii\helpers\Url::to(['/tovar/create']),
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
            [
                'attribute'=>'nazva',
                'value'=>'nazva',
                'contentOptions'=>['style'=>'min-width: 400px;']
            ],
            'parent',
            [
                'attribute' => 'ovymiru',
                'value' => 'ovymiru.name',
                'filter' => Html::activeDropDownList(
                    $searchModel, 'od_vymiru', ArrayHelper::map(
                        OdVymiru::find()->orderBy(['name' => SORT_ASC])->asArray()->all(),
                        'id',
                        'name'
                ), ['class'=>'form-control','prompt' => 'Всі', 'style'=>'min-width: 70px;']),
            ],
            'myIsDirectory',
            'myDeleted',
            'barcode',
            'cina_kup',
            'cina_rozdr',
            'manufacturer',
            ['class' => 'yii\grid\ActionColumn', 'template'=>'{edit}',
                'template' => '{view} {edit} {delete} ',
                'buttons' =>[
                    'edit' => function ($url, $model) {
                        // Html::a args: title, href, tag properties.
                        return Html::a( '<span class="glyphicon glyphicon-pencil"></span>',
                            ['tovar/update', 'id'=>$model['id']],
                            ['class'=>' btn-xs btn-default modalButton', 'title'=>'Update', ]
                        );
                    },
                ],
                'contentOptions'=>['style'=>'width: 80px;']
            ],
        ],
    ]); ?>
    <?php Pjax::end() ?>

</div>
