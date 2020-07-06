<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); //var_dump($idlist); die(); ?>

    <?= $form->field($model,'trait')->dropDownList($idlist) ?>


    <div class="form-group">
        <?= Html::submitButton('Add Trait', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
