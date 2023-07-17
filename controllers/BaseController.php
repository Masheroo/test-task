<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

class BaseController extends Controller
{
    public function redirectToHomeIfUserIsNotGuest(): null|Response
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        return null;
    }

    public function isRequestPost(): bool
    {
        return (bool)Yii::$app->request->post();
    }

    public function getPostData()
    {
        return Yii::$app->request->post();
    }
}