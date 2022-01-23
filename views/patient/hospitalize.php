<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\patient\Patient */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Поместить пациента в отделение';
$this->params['breadcrumbs'][] = ['label' => 'Пациенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-hospitalize">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="patient-hospitalize-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'status')->dropDownList([
                '0' => 'Активный',
                '1' => 'Отключен',
                '2'=>'Удален'
            ]) ?>

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

</div>
