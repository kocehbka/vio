<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\medical_personal\MedicalPersonal */

$this->title = 'Новый врач';
$this->params['breadcrumbs'][] = ['label' => 'Врачи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medical-personal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
