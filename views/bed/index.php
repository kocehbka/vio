<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $ward app\models\ward\Ward */
/* @var $lpuSection app\models\lpu_section\LpuSection */
/* @var $searchModel app\models\bed\BedSearch */
/* @var $id_patient int|null */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Койкоместа палаты ' .  $ward->name . ' отделения ' . $lpuSection->name;
$this->params['breadcrumbs'][] = $this->title;

$buttons = ($id_patient) ? [
                'hospitalize' => function ($url, $model, $key) {
                    $iconName = "plus";

                    $title = \Yii::t('yii', 'Поместить на койкоместо');

                    $id = 'info-'.$key;
                    $options = [
                        'title' => $title,
                        'aria-label' => $title,
                        'data-pjax' => '0',
                        'id' => $id
                    ];

                    $url = Url::to(['bed/hospitalize', 'id' => $key]);
                    $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-$iconName"]);

                    return Html::a($icon, $url, $options);
                }
            ] : [];

?>
<div class="bed-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать койкоместо', ['bed/create/' . $ward->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'number',
            'created_at',
            'updated_at',
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {hospitalize} {update} {delete}',
                'buttons' => $buttons,
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute(['bed/' . $action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
