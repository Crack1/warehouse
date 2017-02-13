<?php

Yii::$app->language = 'es_ES';
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\mpdf\Pdf;

$this->title = 'SIS';
?>
<section class="content-header">
  <h1>
    Dashboard
    <small>Panel de control</small>
  </h1>
</section>
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>150</h3>

          <p>New Orders</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>

          <p>Bounce Rate</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>44</h3>

          <p>User Registrations</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>65</h3>

          <p>Unique Visitors</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <div class="body-content">

    <div class="row">
      <div class="col-lg-4">
        <h2>Heading</h2>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
          dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
          ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
          fugiat nulla pariatur.</p>

          <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h2>Heading</h2>

          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
            fugiat nulla pariatur.</p>

            <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
          </div>
          <div class="col-lg-4">
            <h2>Heading</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
              ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
              fugiat nulla pariatur.</p>

              <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
          </div>

        </div>
   


        <?php
        /* @var $this yii\web\View */
        /* @var $searchModel frontend\models\OsigSearch */
        /* @var $dataProvider yii\data\ActiveDataProvider */

        $this->title = 'Tipificacion de llamadas';

        ?>
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="tbl-osig-index">
              <h1><?= Html::encode($this->title) ?></h1>
              <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
              <?php
              $gridColumns = [
                [
                  'class'=>'kartik\grid\SerialColumn',
                  'contentOptions'=>['class'=>'kartik-sheet-style'],
                  'width'=>'36px',
                  'header'=>'#',
                  'headerOptions'=>['class'=>'kartik-sheet-style']
                ],
                [
                  'class' => 'kartik\grid\DataColumn',
                  'attribute' => 'anio',
                  'vAlign'=>'middle',
                  'group'=>true,
                ],
                [
                  'class' => 'kartik\grid\DataColumn',
                  'attribute' => 'mes',
                  'vAlign'=>'middle',
                  'pageSummary'=>'Total',
                ],
                [
                  'class'=>'kartik\grid\DataColumn',
                  'width'=>'120px',
                  'attribute'=>'Agresion',
                  'vAlign'=>'middle',
                  'pageSummary'=>true,
                ],
                [
                  'class'=>'kartik\grid\DataColumn',
                  'width'=>'120px',
                  'attribute'=>'Informacion',
                  'vAlign'=>'middle',
                  'pageSummary'=>true,
                ],
                [
                  'class'=>'kartik\grid\DataColumn',
                  'width'=>'120px',
                  'attribute'=>'Seguimiento',
                  'vAlign'=>'middle',
                  'pageSummary'=>true,
                ],
                [
                  'class'=>'kartik\grid\DataColumn',
                  'width'=>'120px',
                  'attribute'=>'Consejeria',
                  'vAlign'=>'middle',
                  'pageSummary'=>true,
                ],
                [
                  'class'=>'kartik\grid\DataColumn',
                  'width'=>'120px',
                  'attribute'=>'Broma',
                  'vAlign'=>'middle',
                  'pageSummary'=>true,
                ],
                [
                  'class'=>'kartik\grid\FormulaColumn',
                  'header'=>'TOTAL',
                  'vAlign'=>'middle',
                  'value'=>function ($model, $key, $index, $widget) {
                    $p = compact('model', 'key', 'index');
                    return $widget->col(3, $p) + $widget->col(4, $p) + $widget->col(5, $p) + $widget->col(6, $p) + $widget->col(7, $p);
                  },
                  'headerOptions'=>['class'=>'kartik-sheet-style'],
                  //'hAlign'=>'right',
                  //'width'=>'7%',
                  //'format'=>['decimal', 2],
                  'mergeHeader'=>true,
                  'pageSummary'=>true,
                  'footer'=>true
                ],
              ];

              echo GridView::widget([
                'id' => 'kv-grid-demo',
                'dataProvider'=>$dataProvider,
                'filterModel'=>$searchModel,
                'columns'=>$gridColumns,
                'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
                'headerRowOptions'=>['class'=>'kartik-sheet-style'],
                'filterRowOptions'=>['class'=>'kartik-sheet-style'],
                'pjax'=>true, // pjax is set to always true for this demo
                // set your toolbar
                'toolbar'=> [
                  ['content'=>
                  Html::a('<i class="fa fa-plus"></i> Nuevo Registro', ['create'], ['class' => 'btn btn-success']).''.
                  Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>'Limpiar Filtros'])
                ],
                '{export}',
                '{toggleData}',
              ],
              // set export properties
              'export'=>[
                'fontAwesome'=>true
              ],
              // parameters from the demo form
              'bordered'=> true,
              'striped'=> true,
              'condensed'=> true,
              'responsive'=> true,
              'hover'=> true,
              'showPageSummary'=> true,
              'panel'=>[
                'type'=>GridView::TYPE_PRIMARY,
                //'heading'=>$heading,
              ],
              'persistResize'=>false,
              //'exportConfig'=>$exportConfig,
            ]);
            ?>
