<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\medical_personal\MedicalPersonal */

$this->title = 'Update Medical Personal: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Medical Personals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="medical-personal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
