<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ward\Ward */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ward-form">

    <?php $form = ActiveForm::begin(); ?>

	Отделение: <?=$model->getLpuSection()->one()->name ?>

    <?= $form->field($model, 'id_lpu_section')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
