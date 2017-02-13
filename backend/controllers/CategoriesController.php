<?php

namespace backend\controllers;

use Yii;
use backend\models\TblCategories;
use backend\models\CategoriesSearch;
use common\component\AccessRule;
use common\models\User;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
/**
 * CategoriesController implements the CRUD actions for TblCategories model.
 */
class CategoriesController extends Controller
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
     * Lists all TblCategories models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblCategories model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblCategories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblCategories();

        if ($model->load(Yii::$app->request->post())) {
        $model->created_at = date('Y-m-d H:i:s');
        $model->updated_at = date('Y-m-d H:i:s');
        $model->user = \Yii::$app->user->identity->id;
        $model->save();
        return $this->redirect(['index']);
            return $this->redirect(['view', 'id' => $model->id_category]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblCategories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at = date('Y-m-d H:i:s');
            $model->user = \Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(['index']);
            //return $this->redirect(['view', 'id' => $model->id_category]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblCategories model.
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
     * Finds the TblCategories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblCategories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblCategories::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
