<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\OdVymiru */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$this->registerJs(
    '$("document").ready(function(){
            $("#new_odvymiru").on("pjax:end", function() {
                $.pjax.reload({container:"#odvymiru"});  
        });
    });'
);
?>

<div class="od-vymiru-form" style="width: 400px; padding: 25px;">
    <?php yii\widgets\Pjax::begin(['id' => 'new_odvymiru']) ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ?
            Yii::t('app', 'Створити') :
            Yii::t('app', 'Редагувати'),
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>
</div>
