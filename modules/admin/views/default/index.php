<?php

use app\models\ImageModel;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>

<div class="admin-default-index">
    <?= Html::a('Edit Retail', \yii\helpers\Url::to(\Yii::getAlias('@web/admin/retailobj'),true), ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Edit Traits', \yii\helpers\Url::to(\Yii::getAlias('@web/admin/traits'),true), ['class' => 'btn btn-primary']) ?>

</div>
