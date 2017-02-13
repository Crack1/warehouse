<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\TblDProducts;
use backend\models\TblCategories;
use backend\models\User;
use kartik\widgets\SwitchInput;
use kartik\widgets\FileInput;


/* @var $this yii\web\View */
/* @var $model backend\models\TblOsig */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="tbl-user-create">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary" style="padding:15px;">
          <div class="box-header with-border">
            <h3 class="box-title">Product details:</h3>
          </div>
          <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

            <?= Html::activeLabel($model, 'name', ['label'=>'Name', 'class'=>'control-label']) ?>
            <?php echo $form->field($model, 'name', ['showLabels'=>false])->textInput(); ?>


            <?= Html::activeLabel($model, 'description', ['label'=>'Description', 'class'=>'control-label']) ?>
            <?= $form->field($model, 'description', ['showLabels'=>false])->textarea(['rows' => 4]) ?>

            <?= $form->field($model, 'picture')->widget(FileInput::classname(),
          ['options' => ['accept' => 'image/*'],
  'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],],
        ]); ?>


            <?= Html::activeLabel($model, 'price', ['label'=>'Price', 'class'=>'control-label']) ?>
            <?php echo $form->field($model, 'price', ['showLabels'=>false])->textInput(); ?>


            <?= Html::activeLabel($model, 'status', ['class'=>'control-label']) ?>
            <?php if ($model->isNewRecord) { $model->status = true; } ?>
            <?= $form->field($model, 'status', ['showLabels'=>false])->widget(SwitchInput::classname(), [
              'pluginOptions'=>[
                'handleWidth'=>70,
                'onColor' => 'success',
                'offColor' => 'danger',
                'onText'=>'<i class="fa fa-check"></i> Enable',
                'offText'=>'<i class="fa fa-close"></i> Disable']
              ]); ?>

      </div>
    </div>
  <!--Categories -->

    <div class="col-md-6">
      <div class="box box-success" style="padding:15px;">
        <div class="box-header with-border">
          <h3 class="box-title">Products Categories</h3>
        </div>
        <?php $options = ArrayHelper::map($categories, 'id_category', 'name');
        echo $form->field($model, 'cats')->checkboxList($options, [
          'separator' => '<br>', 'template'=>'<tr><td >{label}</td><td>{input}</td></tr>', 'unselect'=>NULL, 'inline'=>true])->label(false); ?>
        </div>
      </div>
      </div>
    <div class="box-footer">
      <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>
</div>
  </form>
  <?php ActiveForm::end(); ?>
