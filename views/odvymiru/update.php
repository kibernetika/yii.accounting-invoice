<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OdVymiru */

$this->title = Yii::t('app', 'Редагування {modelClass}', [
    'modelClass' => 'Одиниці виміру',
]) ;
//?>
<div class="od-vymiru-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
