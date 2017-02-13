<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Usuario;
use frontend\models\SignupForm;
use frontend\models\UserSearch;
use common\component\AccessRule;
use common\models\User;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use yii\web\UploadedFile;

/**
* UserController implements the CRUD actions for user model.
*/
class UserController extends Controller
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
        //'only' => ['index','create','update','view'],
        'rules' => [
          [
            //'actions' => ['index'],
            'allow' => true,
            'roles' => [
              //User::ROLE_USER,
              User::ROLE_ADMIN,
            ],
          ],
        ],
      ],
    ];
  }

  /**
  * Lists all user models.
  * @return mixed
  */
  public function actionIndex()
  {
    $searchModel = new UserSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }

  /**
  * Displays a single user model.
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
  * Creates a new user model.
  * If creation is successful, the browser will be redirected to the 'view' page.
  * @return mixed
  */
  public function actionCreate()
  {
    $model = new User();

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['view', 'id' => $model->id]);
    } else {
      return $this->render('create', [
        'model' => $model,
      ]);
    }
  }

  /**
  * Updates an existing user model.
  * If update is successful, the browser will be redirected to the 'view' page.
  * @param integer $id
  * @return mixed
  */
  public function actionUpdate($id)
  {
    $model = $this->findModel($id);    
    $model2 = User::find()
    ->where(['id' => $id])
    ->one();

    $j = $model2->password_hash;

    if ($model->load(Yii::$app->request->post())) {
      $model->username = $_POST['User']['username'];
      $model->nombre = $_POST['User']['nombre'];
      $model->apellido = $_POST['User']['apellido'];
      $model->email = $_POST['User']['email'];
      $model->role = $_POST['User']['role'];
      $model->status = $_POST['User']['status'];
      $image = UploadedFile::getInstance($model, 'imagen');

      if (empty($image)){
        $model->imagen = $_POST['User']['imagen'];
      }
      else {
      $ext = end((explode(".", $image->name)));
      $name = Yii::$app->security->generateRandomString().".{$ext}";
      $path = Yii::$app->basePath . '/web/uploads/' . $name;
      $path2 = Yii::$app->request->baseUrl . '/uploads/' . $name;;
      $model->imagen = $path2;
      $image->saveAs($path);
    }

    $i = $_POST['User']['password_hash'];
    if (empty($i)){
    $model->password_hash = $j;
  }
  else{
    $new_password = Yii::$app->security->generatePasswordHash($i);
    $model->password_hash = $new_password;
  }

      $model->save();
      return $this->redirect(['view', 'id' => $model->id]);
    } else {
      return $this->render('update', [
        'model' => $model,
        'model2' => $model2,
      ]);
    }
  }

  /**
  * Deletes an existing user model.
  * If deletion is successful, the browser will be redirected to the 'index' page.
  * @param integer $id
  * @return mixed
  */
  public function actionDelete($id)
  {
    $this->findModel($id)->delete();

    return $this->redirect(['index']);
  }

  public function actionSignup()
  {
    $model = new SignupForm();
    if ($model->load(Yii::$app->request->post()))
    {
      $image = UploadedFile::getInstance($model, 'imagen');
      if (empty($image)){
        $name = Yii::$app->request->baseUrl . '/uploads/avatar.png';
        $model->imagen = $name;
      }
      else {

      $ext = end((explode(".", $image->name)));
      $name = Yii::$app->security->generateRandomString().".{$ext}";
      $path = Yii::$app->basePath . '/web/uploads/' . $name;
      $path2 = Yii::$app->request->baseUrl . '/uploads/' . $name;
      $model->imagen = $path2;
      $image->saveAs($path);
    }
      if ($user = $model->signup()) {
        {
          return $this->redirect(['index']);
        }
      }
    }

    return $this->render('signup', [
      'model' => $model,
    ]);
  }

  /**
  * Finds the user model based on its primary key value.
  * If the model is not found, a 404 HTTP exception will be thrown.
  * @param integer $id
  * @return user the loaded model
  * @throws NotFoundHttpException if the model cannot be found
  */
  protected function findModel($id)
  {
    if (($model = user::findOne($id)) !== null) {
      return $model;
    } else {
      throw new NotFoundHttpException('The requested page does not exist.');
    }
  }
}
