<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CasosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-casos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_caso') ?>

    <?= $form->field($model, 'victima') ?>

    <?= $form->field($model, 'tipo_llamada') ?>

    <?= $form->field($model, 'num_telefono') ?>

    <?= $form->field($model, 'departamento') ?>

    <?php // echo $form->field($model, 'municipio') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'agresor') ?>

    <?php // echo $form->field($model, 'agresor_nombre') ?>

    <?php // echo $form->field($model, 'agresor_sexo') ?>

    <?php // echo $form->field($model, 'agresor_edad') ?>

    <?php // echo $form->field($model, 'agresor_relacion') ?>

    <?php // echo $form->field($model, 'agresor_parentesco') ?>

    <?php // echo $form->field($model, 'agresor_osig') ?>

    <?php // echo $form->field($model, 'agresor_vehiculo') ?>

    <?php // echo $form->field($model, 'ambito_agresion') ?>

    <?php // echo $form->field($model, 'opcion_agresion') ?>

    <?php // echo $form->field($model, 'motivo') ?>

    <?php // echo $form->field($model, 'accion') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'inst_referencia') ?>

    <?php // echo $form->field($model, 'estado_seguimiento') ?>

    <?php // echo $form->field($model, 'nivel_atencion') ?>

    <?php // echo $form->field($model, 'agente_asignado') ?>

    <?php // echo $form->field($model, 'us_ingreso') ?>

    <?php // echo $form->field($model, 'fecha_ingreso') ?>

    <?php // echo $form->field($model, 'fecha_modificacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
