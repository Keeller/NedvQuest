<?php

namespace app\models;

use yii\base\Model;
use yii\base\Module;


class TraitModel extends Model
{
    /**
     * {@inheritdoc}
     */
   public $trait;

   public function rules()
   {
       return [
           ['trait','integer']
       ];
   }


}
