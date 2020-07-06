<?php

use app\models\ImageModel;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Retailobjs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="retailobj-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Retailobj', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'description:ntext',
            'adress',
            'x',
            'y',
            'z',
            [
                'format'=>'html',
                'label'=>'Image',
                'value'=>function($data){
                    $res='';
                    foreach ($data->getImages() as $value) {

                        $res .= Html::img(ImageModel::getFolder().$value->path, ['width' => 200]);

                    }
                    //var_dump($res);die();
                    return $res;
                }
            ],
            [
                'format'=>'html',
                'label'=>'Traits',
                'value'=>function($data){
                    $res='';
                    //var_dump($data->getRetailTraits());die();
                    foreach ($data->getRetailTraits()->all() as $value) {

                        $res .= $value->name.' ';

                    }

                    return $res;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
