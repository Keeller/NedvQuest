<?php

namespace app\modules\admin\controllers;

use app\models\ImageModel;
use app\models\Images;
use app\models\RetailTrait;
use app\models\TraitModel;
use app\models\Traits;
use Yii;
use app\models\Retailobj;
use yii\data\ActiveDataProvider;
use yii\db\mssql\PDO;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * RetailobjController implements the CRUD actions for Retailobj model.
 */
class RetailobjController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Retailobj models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Retailobj::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Retailobj model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Retailobj model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Retailobj();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Retailobj model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Retailobj model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $model=$this->findModel($id);
        foreach ($model->getImages() as $value)
            ImageModel::deleteCurrentImage($value->path);
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Retailobj model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Retailobj the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Retailobj::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionImage($id){

        $model=new ImageModel();
        if(\Yii::$app->request->isPost){
            $id=(int)$id;
            if($id>0){

                $filename=$model->uploadFile(UploadedFile::getInstance($model,'image'));
                $i=new Images();
                $i->retail_id=$id;
                $i->path=$filename;

                if($i->save()){
                    return $this->redirect(['view','id'=>$id]);
                }
            }
        }
        return $this->render('image',['model'=>$model]);
    }

    public function actionTrait($id){
        $model=new TraitModel();
        $id=(int)$id;
        if(\Yii::$app->request->isPost){
            $model->attributes=$_POST['TraitModel'];

            if($model->validate()){
                $rt=new RetailTrait();
                $rt->retail_id=$id;
                $rt->trait_id=$model->trait;
                $rt->save();
            }

        }


        $asw=\Yii::$app->db->createCommand("SELECT traits.id, traits.name FROM traits LEFT JOIN (SELECT traits.id,traits.name FROM retailobj JOIN retail_trait ON retailobj.id=retail_trait.retail_id JOIN traits ON traits.id=retail_trait.trait_id WHERE retailobj.id={$id}) AS t ON traits.id=t.id WHERE t.id IS NULL;")->queryAll();
        //var_dump());die();
        return $this->render('traits',['model'=>$model,'idlist'=>ArrayHelper::map($asw,'id','name')]);
    }
}
