<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\patient\Patient */

$this->title = 'Создать пациента';
$this->params['breadcrumbs'][] = ['label' => 'Пациенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
