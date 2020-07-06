<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property string|null $path
 * @property int|null $retail_id
 *
 * @property Retailobj $retail
 */
class Images extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['retail_id'], 'integer'],
            [['path'], 'string', 'max' => 255],
            [['retail_id'], 'exist', 'skipOnError' => true, 'targetClass' => Retailobj::className(), 'targetAttribute' => ['retail_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
            'retail_id' => 'Retail ID',
        ];
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
