<?php
//Yii::$app->language = 'es_ES';
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\mpdf\Pdf;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OsigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products list';
$this->params['breadcrumbs'][] = $this->title;
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
          'attribute' => 'name',
          'vAlign'=>'middle',
          // 'format'=>'raw',
          // 'value'=>function ($model, $key, $index, $widget) {
          //   return Html::a($model->nombre, ['view', 'id' => $model->id_osig]);
          // },
        ],
        [
          'class' => 'kartik\grid\DataColumn',
          'attribute' => 'price',
          'vAlign'=>'middle',
          'format'=>['decimal', 2],
          // 'format'=>'raw',
          // 'value'=>function ($model, $key, $index, $widget) {
          //   return Html::a($model->nombre, ['view', 'id' => $model->id_osig]);
          // },
        ],
        [
          'class'=>'kartik\grid\BooleanColumn',
          'width'=>'120px',
          'attribute'=>'status',
          'vAlign'=>'middle',
        ],
        [
          'class'=>'kartik\grid\ActionColumn',
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
          Html::a('<i class="fa fa-plus"></i> Add Product', ['create'], ['class' => 'btn btn-success']).''.
          Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>'Clear'])
        ],
        '{export}',
        '{toggleData}',
      ],
      // set export properties
      'export'=>[
        'fontAwesome'=>true
      ],
      // parameters from the demo form
      // 'bordered'=>$bordered,
      // 'striped'=>$striped,
      // 'condensed'=>$condensed,
      // 'responsive'=>$responsive,
      // 'hover'=>$hover,
      //'showPageSummary'=>$pageSummary,
      'panel'=>[
        'type'=>GridView::TYPE_PRIMARY,
        //'heading'=>$heading,
      ],
      'persistResize'=>false,
      //'exportConfig'=>$exportConfig,
    ]);
    ?>
  </div>
</div>
</div>
