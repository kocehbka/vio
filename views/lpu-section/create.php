<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\lpu_section\LpuSection */

$this->title = 'Create Lpu Section';
$this->params['breadcrumbs'][] = ['label' => 'Lpu Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lpu-section-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
