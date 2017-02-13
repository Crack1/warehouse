<?php

namespace backend\controllers;

use Yii;
use backend\models\TblProducts;
use backend\models\TblProductCategories;
use backend\models\TblCategories;
use backend\models\ProductsSearch;
use common\component\AccessRule;
use common\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;
/**
 * ProductsController implements the CRUD actions for TblProducts model.
 */
class ProductsController extends Controller
{
    /**
     * @inheritdoc
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
        'access' => [
          'class' => AccessControl::className(),
          'ruleConfig' => ['class' => AccessRule::className(), ],
          'only' => ['index','create','update','view'],
          'rules' => [
            [
              //'actions' => ['index','create','update','view','delete'],
              'allow' => true,
              'roles' => [
                User::ROLE_USER,
                //User::ROLE_ADMIN, '@'
                User::ROLE_ADMIN,
              ],
            ],
          ],
        ],
      ];
    }

    /**
     * Lists all TblProducts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblProducts model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
      $categories = TblProductCategories::find()
      ->where(['product' => $id])
      ->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'categories' => $categories,
        ]);
    }

    /**
     * Creates a new TblProducts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblProducts();
        $categories = TblCategories::find()->where(['status'=>1])->all();

        if ($model->load(Yii::$app->request->post()) ) {

          $image = UploadedFile::getInstance($model, 'picture');


          $ext = end((explode(".", $image->name)));
          $name = Yii::$app->security->generateRandomString().".{$ext}";
          $path = Yii::$app->basePath . '/web/uploads/' . $name;
          $path2 = Yii::$app->request->baseUrl . '/uploads/' . $name;
          $model->picture = $path2;
          $image->saveAs($path);

          $model->created_at = date('Y-m-d H:i:s');
          $model->updated_at = date('Y-m-d H:i:s');
          $model->user = \Yii::$app->user->identity->id;
          $model->save();


          return $this->redirect(['index']);
            //return $this->redirect(['view', 'id' => $model->id_product]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'categories' => $categories,
            ]);
        }
    }

    /**
     * Updates an existing TblProducts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model2 = $this->findModel($id);
        $model = TblProducts::find()->where(['id_product'=>$id])->one();
        $categories = TblCategories::find()->where(['status'=>1])->all();
        $model->cats = ArrayHelper::getColumn(
            $model->getTblProductCategories()->asArray()->all(),
            'category'
            );

        if ($model->load(Yii::$app->request->post())) {

$image = UploadedFile::getInstance($model, 'picture');

$ext = end((explode(".", $image->name)));
$name = Yii::$app->security->generateRandomString().".{$ext}";
$path = Yii::$app->basePath . '/web/uploads/' . $name;
$path2 = Yii::$app->request->baseUrl . '/uploads/' . $name;
$model->picture = $path2;
$image->saveAs($path);

$model->updated_at = date('Y-m-d H:i:s');
$model->user = \Yii::$app->user->identity->id;
$model->save();



            return $this->redirect(['view', 'id' => $model->id_product]);
        } else {
            return $this->render('update', [
                'model2' => $model2,
                'model' => $model,
                'categories' => $categories,
            ]);
        }
    }

    /**
     * Deletes an existing TblProducts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
      $model = $this->findModel($id);
      $model->status = 0;
      $model->save();
        //$this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblProducts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblProducts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblProducts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
