<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tovar */

$this->title = Yii::t('app', 'Новий товар');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tovars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tovar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
