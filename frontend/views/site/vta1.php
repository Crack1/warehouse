<?php
Yii::$app->language = 'es_ES';
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\mpdf\Pdf;
use yii\web\JsExpression;
?>

<div class="row">
  <div class="col-md-12">
    <div class="tbl-tipificacion-index">
      <h1>Tipificacion de llamadas</h1>
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
        'id' => 'kv-grid-1',
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
  </div>
</div>
</div>
