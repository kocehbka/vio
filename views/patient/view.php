<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\patient\Patient */

$this->title = 'Пациент ' . $model->lastname . ' ' . $model->name . ' ' . $model->patronymic;
$this->params['breadcrumbs'][] = ['label' => 'Пациенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="patient-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'lastname',
            'name',
            'patronymic',
            'birthday',
            'gender',
            'passport_seria',
            'passport_number',
            'passport_date',
            'passport_issued_by',
            'address',
            'snils',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
