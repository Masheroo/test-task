<?php

namespace app\controllers\admin;

use app\controllers\BaseController;
use yii\filters\AccessControl;
use yii\web\Controller;

class AdminController extends BaseController
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access'=>[
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@']
                        ]
                    ]
                ]
            ]
        );
    }
}