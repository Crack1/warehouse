<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use kartik\widgets\FileInput;

$this->title = 'New user';
$this->params['breadcrumbs'][] = ['label' => 'Users List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- <h1><?php //echo Yii::$app->basePath; ?></h1>
<h1><?php //echo Yii::$app->request->hostInfo; ?></h1>
<h1><?php //echo Yii::$app->request->baseUrl; ?></h1> -->

<div class="tbl-user-create">
  <h1><?= Html::encode($this->title) ?></h1>
  <div class="row">
    <div class="col-md-6">
      <div class="box box-primary" style="padding:15px;">
        <div class="box-header with-border">
          <h3 class="box-title">Add new user</h3>
        </div>
        <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
        <?php// $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'nombre')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'apellido')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'imagen')->widget(FileInput::classname(),
        ['options' => ['accept' => 'image/*'],
'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],],
      ]); ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'role')->dropDownList([10 => 'Administrator', 20 => 'Employee' ], ['prompt' => '- Select role -']) ?>
        <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
          'pluginOptions'=>[
            'handleWidth'=>70,
            'onColor' => 'success',
            'offColor' => 'danger',
            'onText'=>'<i class="fa fa-check"></i> Enabled',
            'offText'=>'<i class="fa fa-close"></i> Disabled']
          ]); ?>
          <div class="box-footer">
            <?= Html::submitButton('Aceptar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
            <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
          </div>
          <?php ActiveForm::end(); ?>
        </div>
      </div>
    </div>
  </div>
