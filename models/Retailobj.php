<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "retailobj".
 *
 * @property int $id
 * @property string|null $description
 * @property string|null $adress
 * @property int|null $x
 * @property int|null $y
 * @property int|null $z
 *
 * @property Images[] $images
 * @property RetailTrait[] $retailTraits
 */
class Retailobj extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'retailobj';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['x', 'y', 'z'], 'integer'],
            [['adress'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'adress' => 'Adress',
            'x' => 'X',
            'y' => 'Y',
            'z' => 'Z',
        ];
    }

    /**
     * Gets query for [[Images]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Images::className(), ['retail_id' => 'id'])->all();
    }

    /**
     * Gets query for [[RetailTraits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRetailTraits()
    {
        return $this->hasMany(Traits::className(), ['id' => 'trait_id'])->viaTable('retail_trait',
            ['retail_id'=>'id']);
    }
}
