<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 05.07.2020
 * Time: 23:50
 */

namespace app\controllers;


use yii\filters\auth\HttpBearerAuth;
use yii\filters\Cors;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;
use yii\web\Response;

class RetailController extends ActiveController
{

    public $modelClass='app\models\Retailobj';

    public function behaviors()
    {
        $behaviors = parent::behaviors();


        $behaviors['contentNegotiator'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'text/html' => Response::FORMAT_JSON,
                'application/json' => Response::FORMAT_JSON,
                'application/xml' => Response::FORMAT_XML,
            ],
        ];


        $auth = $behaviors['authenticator'];
        unset($behaviors['authenticator']);



        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
        ];



        $behaviors['authenticator'] = $auth;
        $behaviors['authenticator']['except'] = ['options'];

        return $behaviors;
    }



}