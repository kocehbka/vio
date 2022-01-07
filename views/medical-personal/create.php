<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\medical_personal\MedicalPersonal */

$this->title = 'Create Medical Personal';
$this->params['breadcrumbs'][] = ['label' => 'Medical Personals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medical-personal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
