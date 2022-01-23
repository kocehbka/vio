<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\patient\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пациенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новый пациент', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'lastname',
            'name',
            'patronymic',
            'birthday',
            'gender',
            /*'passport_seria',
            'passport_number',
            'passport_date',
            'passport_issued_by',
            'address',
            'snils',
            'created_at',
            'updated_at',*/
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {hospitalize} {discharge} {update} {delete}',
                'buttons' => [
                    'hospitalize' => function ($url, $model, $key) {
                        $iconName = "plus";

                        $title = \Yii::t('yii', 'Поместить в отделение');

                        $id = 'info-'.$key;
                        $options = [
                            'title' => $title,
                            'aria-label' => $title,
                            'data-pjax' => '0',
                            'id' => $id
                        ];

                        $url = Url::current(['hospitalize', 'id' => $key]);
                        $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-$iconName"]);

                        return Html::a($icon, $url, $options);
                    },
                    'discharge' => function ($url, $model, $key) {
                        if(!$model->getActiveMedicalCard()->count()) {
                            return false;
                        }

                        $iconName = "minus";

                        $title = \Yii::t('yii', 'Выписать из отделения');

                        $id = 'info-'.$key;
                        $options = [
                            'title' => $title,
                            'aria-label' => $title,
                            'data-pjax' => '0',
                            'id' => $id
                        ];

                        $url = Url::current(['', 'id' => $key]);
                        $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-$iconName"]);

                        return Html::a($icon, $url, $options);
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
