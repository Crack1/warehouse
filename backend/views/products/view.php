<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use backend\models\TblAcciones;
use kartik\widgets\Select2;
use kartik\daterange\DateRangePicker;
use kartik\mpdf\Pdf;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\TblOsig */

$this->title = 'Product Details';
$this->params['breadcrumbs'][] = ['label' => 'Product List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br />
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary" style="padding:15px;">
      <div class="box-header">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php echo Html::a('<i class="fa fa-edit"></i> Edit', ['update', 'id' => $model->id_product], ['class' => 'btn btn-primary']) ?>

        <?php echo Html::a('<i class="fa fa-ban"></i> Cancel', ['index'], ['class' => 'btn btn-danger', 'data-toggle'=>'tooltip', 'title'=>'Cancel']) ?>
      </div>
      <table class="table table-striped table-hover table-bordered">
        <tr>
          <td width="300px" rowspan="8">
            <img src="<?= Yii::$app->request->hostInfo . $model->picture ?>" width="300" />
          </td>
          <td width="200px"><b>Name:</b></td>
          <td><?= $model->name; ?></td>
        </tr>
        <tr>
          <td><b>Description:</b></td>
          <td><?= $model->description; ?></td>
        </tr>
        <tr>
          <td><b>Price:</b></td>
          <td>$ <?= $model->price; ?></td>
        </tr>
        <tr>
          <td><b>Categories:</b></td>
          <td colspan="3">
            <?php if ($categories) { ?>
              <?php $n = 1; foreach ($categories as $cats) { ?>
                <?php echo $n . ' - ' . $cats->category0->name; ?><br />
                <?php $n++; } ?>
                <?php } ?>
              </td>
            </tr>
            <tr>
              <td><b>Created at:</b></td>
              <td><?= $model->created_at ?></td>
            </tr>
            <tr>
              <td><b>Updated at:</b></td>
              <td><?= $model->updated_at ?></td>
            </tr>
            <tr>
              <td><b>Updated by:</b></td>
              <td><?= $model->user0->nombre .' '. $model->user0->apellido;?></td>
            </tr>
          </table>
        </div>
      </div>



    </div>
