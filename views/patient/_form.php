<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use app\models\patient\Patient;
use app\models\Policy;

/* @var $this yii\web\View */
/* @var $model app\models\PatientForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->widget(DatePicker::class, [
        'language' => 'ru',
        'dateFormat' => 'dd.MM.yyyy',//Yii::$app->formatter->dateFormat,
        'options' => [
            'placeholder' => 'Выбрать дату',
            'class'=> 'form-control',
            'autocomplete'=>'off'
        ],
        'clientOptions' => [
            'changeMonth' => true,
            'changeYear' => true,
            'yearRange' => '1900:' . date('Y')
        ]]) ?>

    <?= $form->field($model, 'gender')->dropDownList(Patient::getPatientGenders(), ['prompt' => 'Выберите пол']) ?>

    <?= $form->field($model, 'passport_seria')->textInput() ?>

    <?= $form->field($model, 'passport_number')->textInput() ?>

    <?= $form->field($model, 'passport_date')->widget(DatePicker::class, [
        'language' => 'ru',
        'dateFormat' => 'dd.MM.yyyy',//Yii::$app->formatter->dateFormat,
        'options' => [
            'placeholder' => 'Выбрать дату',
            'class'=> 'form-control',
            'autocomplete'=>'off'
        ],
        'clientOptions' => [
            'changeMonth' => true,
            'changeYear' => true,
            'yearRange' => '1900:' . date('Y')
        ]]) ?>

    <?= $form->field($model, 'passport_issued_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'snils')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'policy_type')->dropDownList(Policy::getPolicyTypes(), ['prompt' => 'Выберите тип полиса']) ?>

    <?= $form->field($model, 'policy_number')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
