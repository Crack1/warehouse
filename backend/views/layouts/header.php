<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

  <?= Html::a('<img src="logo.png" class="logo-lg" align="center" height="50px"' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

  <nav class="navbar navbar-static-top" role="navigation">

    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
<div class="navbar-custom-title">
  Warehouse Yii2 - DEMO
</div>


    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">                <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="<?= Yii::$app->request->hostInfo . Yii::$app->user->identity->imagen ?>" class="user-image" alt="User Image"/>
          <span class="hidden-xs"><?= \Yii::$app->user->identity->username ?></span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="<?= Yii::$app->request->hostInfo . Yii::$app->user->identity->imagen ?>" width="150" alt="User Image"/>
            <p>
              <?= Yii::$app->user->identity->nombre . ' ' . Yii::$app->user->identity->apellido; ?>
              <small>
                <?php if (Yii::$app->user->identity->role == 10)
                {
                  echo "ADMINISTRATOR" ;
                }
                else
                {
                  echo "EMPLOYEE" ;
                }


                ?>

                </small>
            </p>
          </li>
          <!-- Menu Body -->
          <!-- <li class="user-body">
          <div class="col-xs-4 text-center">
          <a href="#">Followers</a>
        </div>
        <div class="col-xs-4 text-center">
        <a href="#">Sales</a>
      </div>
      <div class="col-xs-4 text-center">
      <a href="#">Friends</a>
    </div>
  </li> -->
  <!-- Menu Footer-->
  <li class="user-footer">
    <!-- <div class="pull-left">
      <a href="#" class="btn btn-default btn-flat">Perfil</a>
    </div> -->
    <div align="center">
      <?= Html::a(
      'Exit',
      ['/site/logout'],
      ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
      ) ?>
    </div>
  </li>
</ul>
</li>

<!-- User Account: style can be found in dropdown.less -->
</ul>
</div>
</nav>
</header>
