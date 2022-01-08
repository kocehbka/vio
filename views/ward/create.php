<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ward\Ward */

$this->title = 'Создать палату';
$this->params['breadcrumbs'][] = ['label' => 'Палаты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ward-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
