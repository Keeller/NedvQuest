<?php
/**
 * Created by PhpStorm.
 * User: kolya
 * Date: 04.07.2020
 * Time: 14:05
 */

namespace app\models;


use yii\base\Model;
use yii\web\UploadedFile;

class ImageModel extends Model
{
    public $image;

    public function rules()
    {
        return [
            [['image'],'required'],
            [['image'],'file','extensions'=>'jpg,png']
        ];
    }

    public function uploadFile(UploadedFile $file)
    {
        $this->image=$file;
        if($this->validate())
        {
            $filename = strtolower(md5(uniqid($file->baseName)) . '.' . $file->extension);
            $folder=\Yii::getAlias("@webroot/uploads/").$filename;
            $file->saveAs($folder);
            return $filename;
        }

    }


    public  static function getFolder()
    {
        return \Yii::getAlias('@web') . '/uploads/';

    }

    public static function deleteCurrentImage($CurrentImage)
    { //echo \Yii::getAlias('@web') . 'uploads/'. $CurrentImage;die();
        if(is_file(\Yii::getAlias('@webroot/uploads/').$CurrentImage)) {

            if (file_exists(\Yii::getAlias('@webroot/uploads/').$CurrentImage)) {
                unlink(\Yii::getAlias('@webroot/uploads/') .$CurrentImage);
            }
        }
    }

}