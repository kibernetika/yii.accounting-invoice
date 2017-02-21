<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tovar */

$this->title = 'Update Tovar: ' . $model->id;
?>
<div class="tovar-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
