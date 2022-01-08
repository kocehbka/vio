<?php

namespace app\controllers;

use yii\web\Controller;

class BaseController extends Controller
{
    public function init()
    {
        parent::init();
        \Yii::$app->language = 'ru-RU';
        \Yii::$app->formatter->locale = 'ru-RU';
    }
}