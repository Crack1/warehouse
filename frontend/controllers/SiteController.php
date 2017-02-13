<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;


use frontend\models\TblDenunciante;
use frontend\models\TblCasos;
use frontend\models\VtaTipoLlamadaMes;
use frontend\models\VtaCasosOsigMes;
use frontend\models\TipoLlamadaMesSearch;
use frontend\models\CasosOsigMesSearch;
use common\component\AccessRule;
use common\models\User;
use yii\web\NotFoundHttpException;
use kartik\mpdf\Pdf;


/**
* Site controller
*/
class SiteController extends Controller
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
        'only' => ['index','create','update','view','vta1'],
        'rules' => [
          [
            //'actions' => ['index'],
            'allow' => true,
            'roles' => [
              User::ROLE_USER,
              User::ROLE_ADMIN,
            ],
          ],
        ],
      ],
    ];
  }
  // {
  //   return [
  //     'access' => [
  //       'class' => AccessControl::className(),
  //       //'only' => ['login', 'logout', 'signup'],
  //       'rules' => [
  //         [
  //           'actions' => ['login', 'error'],
  //           'allow' => true,
  //           'roles' => ['?'],
  //         ],
  //         [
  //           'actions' => ['logout', 'index'],
  //           'allow' => true,
  //           'roles' => ['@'],
  //         ],
  //       ],
  //     ],
  //     'verbs' => [
  //       'class' => VerbFilter::className(),
  //       'actions' => [
  //         'logout' => ['post'],
  //       ],
  //     ],
  //   ];
  // }

  /**
  * @inheritdoc
  */
  public function actions()
  {
    return [
      'error' => [
        'class' => 'yii\web\ErrorAction',
      ],
    ];
  }

  public function actionError()
  {
    $exception = Yii::$app->errorHandler->exception;
    if ($exception !== null) {
      return $this->render('error', ['exception' => $exception]);
    }
  }
  /**
  * Displays homepage.
  *
  * @return string
  */
  public function actionIndex()
  {
 

    return $this->render('index', [      

    ]);

    //return $this->render('index');
  }

  /**
  * Login action.
  *
  * @return string
  */
  public function actionLogin()
  {
    if (!Yii::$app->user->isGuest) {
      return $this->goHome();
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
      return $this->goBack();
    } else {
      return $this->render('login', [
        'model' => $model,
      ]);
    }
  }

  /**
  * Logout action.
  *
  * @return string
  */
  public function actionLogout()
  {
    Yii::$app->user->logout();

    return $this->goHome();
  }
}
