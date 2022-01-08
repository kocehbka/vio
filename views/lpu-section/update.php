<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\lpu_section\LpuSection */

$this->title = 'Редактировать отделение: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Отделения', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="lpu-section-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
