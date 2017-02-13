<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Details';
$this->params['breadcrumbs'][] = ['label' => 'User list', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary" style="padding:15px;">
      <div class="box-header">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php echo Html::a('<i class="fa fa-edit"></i> Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary', 'data-toggle'=>'tooltip', 'title'=>'Edit record']) ?>

        <?php //echo Html::a('<i class="fa fa-file-pdf-o"></i> Generar PDF',['report', 'id' => $model->id], ['class'=>'btn btn-success', 'target'=> '_blank', 'data-toggle'=>'tooltip', 'title'=>'Generar documento PDF']);?>

        <?php echo Html::a('<i class="fa fa-ban"></i> Cancel', ['index'], ['class' => 'btn btn-danger', 'data-toggle'=>'tooltip', 'title'=>'Cancelar']) ?>
      </div>
      <table class="table table-striped table-hover table-bordered">
        <tr>
          <td width="150px" rowspan="8"><?php //echo Yii::$app->request->hostInfo . Yii::$app->request->baseUrl . '/uploads/' . $model->imagen ?>
            <img src="<?= Yii::$app->request->hostInfo . $model->imagen ?>" width="150" />
          </td>
          <td width="200px"><b>User name:</b></td>
          <td><?= $model->username ?></td>

        </tr>
        <tr>
          <td><b>First Name:</b></td>
          <td><?= $model->nombre ?></td>
        </tr>
        <tr>
          <td><b>Last name:</b></td>
          <td><?= $model->apellido ?></td>
        </tr>
        <tr>
          <td><b>Email:</b></td>
          <td><?= $model->email ?></td>
        </tr>
        <tr>
          <td><b>Role:</b></td>
          <td>
            <span class="badge bg-<?= $model->role==10?"gray":"purple"; ?>"><?= $model->role==10?"Administrator":"Employee"; ?></span>
          </td>
        </tr>
        <tr>
          <td><b>Status:</b></td>
          <td>
            <span class="badge bg-<?= $model->status==1?"green":"red"; ?>"><?= $model->status==1?"Enable":"Disable"; ?></span>
          </td>
        </tr>
        <tr>
          <td><b>Created at:</b></td>
          <td><?= date('d-m-Y H:i:s', $model->created_at)?></td>
        </tr>
        <tr>
          <td><b>Updated at:</b></td>
          <td><?= date('d-m-Y H:i:s', $model->updated_at) ?></td>
        </tr>
      </table>
    </div>
  </div>
</div>
