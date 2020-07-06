<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "retail_trait".
 *
 * @property int|null $retail_id
 * @property int|null $trait_id
 *
 * @property Traits $trait
 * @property Retailobj $retail
 */
class RetailTrait extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'retail_trait';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['retail_id', 'trait_id'], 'integer'],
            [['trait_id'], 'exist', 'skipOnError' => true, 'targetClass' => Traits::className(), 'targetAttribute' => ['trait_id' => 'id']],
            [['retail_id'], 'exist', 'skipOnError' => true, 'targetClass' => Retailobj::className(), 'targetAttribute' => ['retail_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'retail_id' => 'Retail ID',
            'trait_id' => 'Trait ID',
        ];
    }

    /**
     * Gets query for [[Trait]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrait()
    {
        return $this->hasOne(Traits::className(), ['id' => 'trait_id']);
    }

    /**
     * Gets query for [[Retail]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRetail()
    {
        return $this->hasOne(Retailobj::className(), ['id' => 'retail_id']);
    }
}
