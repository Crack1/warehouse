<?php

Yii::$app->language = 'es_ES';
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\mpdf\Pdf;
use miloschuman\highcharts\Highmaps;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use frontend\models\VtaTipoLlamadaMes;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

$this->title = 'SIS - DASHBOARD';
$numeroDia = date('d');
$dia = date('l');
$mes = date('F');
$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
$nombredia = str_replace($dias_EN, $dias_ES, $dia);
$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
$nombreMes = str_replace($meses_EN, $meses_ES, $mes);
$fecha = $nombredia." ".$numeroDia." de ".$nombreMes;
?>

<div class="col-md-12">
  <h1>Dashboard <small>Sistema Call Center - SIS</small></h1>
</div>
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?= $TotalDenunciantes; ?></h3>
          <p>Total de Personas usuarias</p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
        <a href="index.php?r=denunciante%2Findex" class="small-box-footer">Ver detalle <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?= $TotalCasosPendientes; ?></h3>
          <p>Casos abiertos</p>
        </div>
        <div class="icon">
          <i class="fa fa-book"></i>
        </div>
        <a href="#" class="small-box-footer">Ver detalle <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>21</h3>
          <p>Total de llamadas en <?= $nombreMes;?></p>
        </div>
        <div class="icon">
          <i class="fa fa-phone"></i>
        </div>
        <a href="#" class="small-box-footer">Ver detalle <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>3</h3>
          <p>Llamadas <?= $fecha;?></p>
        </div>
        <div class="icon">
          <i class="fa fa-phone"></i>
        </div>
        <a href="#" class="small-box-footer">Ver detalle <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <!--h1>Mapa</h1-->
      <?php
      // To use Highcharts Map Collection, we must register those files separately.
      // The 'depends' option ensures that the main Highmaps script gets loaded first.
      $this->registerJsFile('http://code.highcharts.com/mapdata/countries/sv/sv-all.js', [
        'depends' => 'miloschuman\highcharts\HighchartsAsset'
      ]);

      echo Highmaps::widget([
        'options' => [
          'title' => [
            'text' => 'Casos registrados por departamento',
          ],
          'mapNavigation' => [
            'enabled' => false,
            'buttonOptions' => [
              'verticalAlign' => 'bottom',
            ]
          ],
          'colorAxis' => [
            'min' => 0,
          ],
          'series' => [
            [
              'data' => [
                ['hc-key' => 'sv-ah', 'value' => 12],
                ['hc-key' => 'sv-ca', 'value' => 2],
                ['hc-key' => 'sv-ch', 'value' => 4],
                ['hc-key' => 'sv-cu', 'value' => 0],
                ['hc-key' => 'sv-li', 'value' => 1],
                ['hc-key' => 'sv-mo', 'value' => 9],
                ['hc-key' => 'sv-pa', 'value' => 0],
                ['hc-key' => 'sv-sa', 'value' => 8],
                ['hc-key' => 'sv-sm', 'value' => 4],
                ['hc-key' => 'sv-so', 'value' => 10],
                ['hc-key' => 'sv-ss', 'value' => 24],
                ['hc-key' => 'sv-sv', 'value' => 2],
                ['hc-key' => 'sv-un', 'value' => 3],
                ['hc-key' => 'sv-us', 'value' => 7],
              ],
              'mapData' => new JsExpression('Highcharts.maps["countries/sv/sv-all"]'),
              'joinBy' => 'hc-key',
              'name' => 'Total de casos:',
              'states' => [
                'hover' => [
                  'color' => '#BADA55',
                ]
              ],
              'dataLabels' => [
                'enabled' => true,
                'format' => '{point.name}',
              ]
            ]
          ]
        ]
      ]);
      ?>
    </div>
    <div class="col-md-6">
      <!--h1>Mapa</h1-->
      <?php
      echo Highcharts::widget([
        'scripts' => [
          'modules/exporting',
          'themes/grid-light',
        ],
        'options' => [
          'title' => [
            'text' => 'Tipificacion de Casos',
          ],
          'xAxis' => [
            'categories' => ['Agresión', 'Información', 'Seguimiento', 'Consejeria', 'Broma'],
          ],
          'labels' => [
            'items' => [
              [
                /*'html' => 'Total fruit consumption',
                'style' => [
                'left' => '350px',
                'top' => '18px',
                'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
              ],*/
            ],
          ],
        ],
        'series' => [
          [
            'type' => 'column',
            'colorByPoint' => true,
            'name' => 'Total de Casos',
            'data' => [29, 61, 21, 31, 12],
          ],

          [
            'type' => 'pie',
            'name' => 'Total',
            'data' => [
              [
                'name' => 'Agresión',
                'y' => 29,
                'color' => new JsExpression('Highcharts.getOptions().colors[0]'), // Jane's color
              ],
              [
                'name' => 'Información',
                'y' => 61,
                'color' => new JsExpression('Highcharts.getOptions().colors[1]'), // John's color
              ],
              [
                'name' => 'Seguimiento',
                'y' => 21,
                'color' => new JsExpression('Highcharts.getOptions().colors[2]'), // Joe's color
              ],
              [
                'name' => 'Consejeria',
                'y' => 31,
                'color' => new JsExpression('Highcharts.getOptions().colors[3]'), // Joe's color
              ],
              [
                'name' => 'Broma',
                'y' => 12,
                'color' => new JsExpression('Highcharts.getOptions().colors[4]'), // Joe's color
              ],

            ],
            'center' => [350, 60],
            'size' => 125,
            'showInLegend' => false,
            'dataLabels' => [
              'enabled' => false,
            ],
          ],
        ],
      ]
    ]);
    ?>
  </div>
</div>

<table class="table table-bordered text-center">
  <tbody>
    <tr>
      <td>
        <div class="col-md-3">
          <?php
          Modal::begin([
            'header' => 'Tipificación de llamadas',
            'id' => 'modal1',
            'toggleButton' => [
              'label' => '<i class="fa fa-th-large"></i>  Tipificación de llamadas',
              'class' => 'btn btn-lg btn-primary btn-flat'
            ],
            'closeButton' => [
              'label' => 'Cerrar',
              'class' => 'btn btn-danger btn-flat pull-right',
            ],
            'size' => 'modal-lg',
          ]);
          Pjax::begin();
          echo '<br/>';
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
            'dataProvider'=>$dataProvider1,
            'filterModel'=>$searchModel1,
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
        Pjax::end();

        yii\bootstrap\Modal::end();
        ?>

      </div>

    </td>
    <td>
      <div class="col-md-3">
        <?php
        Modal::begin([
          'header' => 'Llamadas según OSIG',
          'id' => 'modal2',
          'toggleButton' => [
            'label' => '<i class="fa fa-th-large"></i>  Llamadas según OSIG',
            'class' => 'btn btn-lg btn-primary btn-flat'
          ],
          'closeButton' => [
            'label' => 'Cerrar',
            'class' => 'btn btn-danger btn-flat pull-right',
          ],
          'size' => 'modal-lg',
        ]);
        Pjax::begin();
        echo '<br/>';
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
            'attribute'=>'Bisexual',
            'vAlign'=>'middle',
            'pageSummary'=>true,
          ],
          [
            'class'=>'kartik\grid\DataColumn',
            'width'=>'120px',
            'attribute'=>'Gay',
            'vAlign'=>'middle',
            'pageSummary'=>true,
          ],
          [
            'class'=>'kartik\grid\DataColumn',
            'width'=>'120px',
            'attribute'=>'Heterosexual',
            'vAlign'=>'middle',
            'pageSummary'=>true,
          ],
          [
            'class'=>'kartik\grid\DataColumn',
            'width'=>'120px',
            'attribute'=>'Lesbiana',
            'vAlign'=>'middle',
            'pageSummary'=>true,
          ],
          [
            'class'=>'kartik\grid\DataColumn',
            'width'=>'120px',
            'attribute'=>'TransMasculino',
            'vAlign'=>'middle',
            'pageSummary'=>true,
          ],
          [
            'class'=>'kartik\grid\DataColumn',
            'width'=>'120px',
            'attribute'=>'TransFemenina',
            'vAlign'=>'middle',
            'pageSummary'=>true,
          ],
          [
            'class'=>'kartik\grid\FormulaColumn',
            'header'=>'TOTAL',
            'vAlign'=>'middle',
            'value'=>function ($model, $key, $index, $widget) {
              $p = compact('model', 'key', 'index');
              return $widget->col(3, $p) + $widget->col(4, $p) + $widget->col(5, $p) + $widget->col(6, $p) + $widget->col(7, $p) + $widget->col(8, $p);
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
          'id' => 'kv-grid-2',
          'dataProvider'=>$dataProvider2,
          'filterModel'=>$searchModel2,
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

      Pjax::end();

      yii\bootstrap\Modal::end();
      ?>

    </td>
    <td>
      <div class="col-md-3">
        <?php
        Modal::begin([
          'header' => 'Llamadas según OSIG',
          'id' => 'modal3',
          'toggleButton' => [
            'label' => '<i class="fa fa-th-large"></i>  Llamadas según OSIG',
            'class' => 'btn btn-lg btn-primary btn-flat'
          ],
          'closeButton' => [
            'label' => 'Cerrar',
            'class' => 'btn btn-danger btn-flat pull-right',
          ],
          'size' => 'modal-lg',
        ]);
        Pjax::begin();
        echo '<br/>';
        Pjax::end();
        ?>
    </td>
    <td>
      <?php
      Modal::begin([
        'header' => 'Llamadas según OSIG',
        'id' => 'modal3',
        'toggleButton' => [
          'label' => '<i class="fa fa-th-large"></i>  Llamadas según OSIG',
          'class' => 'btn btn-lg btn-primary btn-flat'
        ],
        'closeButton' => [
          'label' => 'Cerrar',
          'class' => 'btn btn-danger btn-flat pull-right',
        ],
        'size' => 'modal-lg',
      ]);
      Pjax::begin();
      echo '<br/>';
      Pjax::end();
      ?>
    </td>
  </tr>
</tbody></table>




<div class="row">

  <div class="col-md-12">
    <h1>Acciones asociadas al caso</h1>
    <div class="box box-primary" style="padding:15px;">

      <!---Modal 1--->
      <div class="row">



        <!---Modal 2--->
        <br />


      </div>

    </div>
  </div>
</div>
