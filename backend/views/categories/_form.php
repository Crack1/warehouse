<?php
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
?>
<div class="row">
  <div class="col-md-6">
    <div class="box box-primary" style="padding:15px;">
      <div class="box-header with-border">
        <h3 class="box-title">Category</h3>
      </div>
      <?php $form = ActiveForm::begin(['type'=>ActiveForm::TYPE_HORIZONTAL]); ?>
      <form role="form">
        <div class="box-body">
          <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
          <?php if ($model->isNewRecord) { $model->status = true; } ?>
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
            <?= Html::a('<i class="fa fa-ban"></i> Cancel', ['index'], ['class' => 'btn btn-danger']) ?>
          </div>
        </form>
        <?php ActiveForm::end(); ?>
      </div>
    </div>
  </div>
