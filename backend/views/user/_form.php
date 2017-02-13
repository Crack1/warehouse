<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use kartik\widgets\FileInput;
Yii::$app->language = 'es_ES';

?>
<div class="row">
  <div class="col-md-6">
    <div class="box box-primary" style="padding:15px;">
      <div class="box-header with-border">
        <h3 class="box-title">User details</h3>
      </div>
      <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
      <form role="form">
        <div class="box-body">
          <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
          <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>
          <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
          <?= $form->field($model, 'password_hash')->passwordInput(['value'=>'']) ?>
          <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
          <?= $form->field($model, 'imagen')->widget(FileInput::classname(),
          ['options' => ['accept' => 'image/*'], ]); ?>
          <?= $form->field($model, 'imagen', ['showLabels'=>false])->hiddenInput(['maxlength' => true]) ?>
          <?= $form->field($model, 'role')->dropDownList([10 => 'Administrator', 20 => 'Employee' ], ['prompt' => '- Select role -']) ?>
          <?php if ($model->isNewRecord) { $model->estado = true; } ?>
          <?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
            'pluginOptions'=>[
              'handleWidth'=>70,
              'onColor' => 'success',
              'offColor' => 'danger',
              'onText'=>'<i class="fa fa-check"></i> Enable',
              'offText'=>'<i class="fa fa-close"></i> Disable']
            ]); ?>
          </div>
          <div class="box-footer">
            <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"></i> Save' : '<i class="fa fa-save"></i> Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?= Html::a('<i class="fa fa-ban"></i> Cancelar', ['index'], ['class' => 'btn btn-danger']) ?>
          </div>
        </form>
        <?php ActiveForm::end(); ?>
      </div>
    </div>
  </div>
