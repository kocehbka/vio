<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\lpu_section\LpuSectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Отделения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lpu-section-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать отделение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
            	'value' => function ($data) {
    				return Yii::t('app', Yii::$app->formatter->asDateTime($data->created_at));
				}
			],
            [
                'value' => function ($data) {
                    return Yii::t('app', $data->updated_at ? Yii::$app->formatter->asDateTime($data->updated_at) : NULL);
                }
            ],
            [
                'class' => ActionColumn::className(),
				//'template' => '{delete} {update}',
                'urlCreator' => function ($action, $model, $key, $index, $column) {

                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
