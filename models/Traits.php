<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "traits".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property RetailTrait[] $retailTraits
 */
class Traits extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'traits';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[RetailTraits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRetailTraits()
    {
        return $this->hasMany(Retailobj::className(), ['id' => 'retail_id'])->viaTable('retail_trait',
            ['trait_id'=>'id'])->all();
    }
}
