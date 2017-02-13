<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Details';
$this->params['breadcrumbs'][] = ['label' => 'Categories List', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary" style="padding:15px;">
      <div class="box-header">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php echo Html::a('<i class="fa fa-edit"></i> Edit', ['update', 'id' => $model->id_category], ['class' => 'btn btn-primary', 'data-toggle'=>'tooltip', 'title'=>'Edit record']) ?>

        <?php echo Html::a('<i class="fa fa-ban"></i> Cancel', ['index'], ['class' => 'btn btn-danger', 'data-toggle'=>'tooltip', 'title'=>'Cancel']) ?>
      </div>
      <table class="table table-striped table-hover table-bordered">
        <tr>
          <td width="200px"><b>Category name:</b></td>
          <td><?= $model->name ?></td>
        </tr>
        <tr>
          <td><b>Status:</b></td>
          <td>
            <span class="badge bg-<?= $model->status==1?"green":"red"; ?>"><?= $model->status==1?"Active":"Inactive"; ?></span>
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
