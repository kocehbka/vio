<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\bed\Bed */

$this->title = 'Создать койкоместо';
$this->params['breadcrumbs'][] = ['label' => 'Койкоместа', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bed-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
