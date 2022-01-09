<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\bed\Bed */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bed-form">

    <?php $form = ActiveForm::begin(); ?>

	Палата <?=$model->getWard()->one()->name ?> отделения <?=$model->getWard()->one()->getLpuSection()->one()->name ?>

    <?= $form->field($model, 'id_ward')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
