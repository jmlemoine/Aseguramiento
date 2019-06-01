<?php
use yii\helpers\Html;
use kartik\social\GoogleAnalytics;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\widgets\Pjax;
use dosamigos\chartjs\ChartJs;
use machour\yii2\notifications\models\Notification;
use backend\models\Presentacion;

/* @var $this yii\web\View */

$this->title = '';

//$presentacion = new Presentacion();
//Notification::notify(Notification::KEY_MEETING_REMINDER, 6, $presentacion->id);

?>
<div class="row">
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Area Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
              <?= ChartJs::widget([
                    'type' => 'line',
                    /*
                    'options' => [
                        "height"=>400,
                        "width" =>400,
                    ],
                    */
                    'clientOptions' => [
                        'responsive' => true,
                    ],
                    'data' => [
                        'labels' => ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
                        'datasets' => [
                            [
                                'label' => "Santiago",
                                'fill' => true,
                                'backgroundColor' => "rgba(179,181,198,0.2)",
                                'borderColor' => "rgba(179,181,198,1)",
                                'pointBackgroundColor' => "rgba(179,181,198,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                                'data' => [65, 59, 90, 81, 56, 55, 40]
                            ],
                            [
                                'label' => "La vega",
                                'fill' => true,
                                'backgroundColor' => "rgba(255,99,132,0.2)",
                                'borderColor' => "rgba(255,99,132,1)",
                                'pointBackgroundColor' => "rgba(255,99,132,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                                'data' => [28, 48, 40, 19, 96, 27, 100]
                            ]
                        ]
                    ]
                    ]);
                    ?>
                
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Donut Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            <?= ChartJs::widget([
                    'type' => 'doughnut',
                    /*
                    'options' => [
                        "height"=>400,
                        "width" =>400,
                    ],
                    */
                    'clientOptions' => [
                        'responsive' => true,
                    ],
                    'data' => [
                        'labels' => ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                        'datasets' => [
                            [
                                'label' => "Santiago",
                                //'fill' => true,
                                'backgroundColor' => [ 
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                                ],
                                'data' => [65, 59, 90, 81, 56, 55, 40]
                            ],
                        ]
                    ]
                    ]);
                    ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
          <!-- LINE CHART -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Line Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
              <?= ChartJs::widget([
                    'type' => 'line',
                    /*
                    'options' => [
                        "height"=>400,
                        "width" =>400,
                    ],
                    */
                    'clientOptions' => [
                        'responsive' => true,
                    ],
                    'data' => [
                        'labels' => ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
                        'datasets' => [
                            [
                                'label' => "Santiago",
                                'fill' => false,
                                'backgroundColor' => "rgba(179,181,198,0.2)",
                                'borderColor' => "rgba(179,181,198,1)",
                                'pointBackgroundColor' => "rgba(179,181,198,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                                'data' => [65, 59, 90, 81, 56, 55, 40]
                            ],
                            [
                                'label' => "La vega",
                                'fill' => false,
                                'backgroundColor' => "rgba(255,99,132,0.2)",
                                'borderColor' => "rgba(255,99,132,1)",
                                'pointBackgroundColor' => "rgba(255,99,132,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                                'data' => [28, 48, 40, 19, 96, 27, 100]
                            ]
                        ]
                    ]
                    ]);
                    ?>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
              <?= ChartJs::widget([
                    'type' => 'bar',
                    /*
                    'options' => [
                        "height"=>400,
                        "width" =>400,
                    ],
                    */
                    'clientOptions' => [
                        'responsive' => true,
                    ],
                    'data' => [
                        'labels' => ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
                        'datasets' => [
                            [
                                'label' => "Santiago",
                                'fill' => true,
                                'backgroundColor' => "rgba(179,181,198,0.2)",
                                'borderColor' => "rgba(179,181,198,1)",
                                'pointBackgroundColor' => "rgba(179,181,198,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                                'data' => [65, 59, 90, 81, 56, 55, 40]
                            ],
                            [
                                'label' => "La vega",
                                'fill' => true,
                                'backgroundColor' => "rgba(255,99,132,0.2)",
                                'borderColor' => "rgba(255,99,132,1)",
                                'pointBackgroundColor' => "rgba(255,99,132,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                                'data' => [28, 48, 40, 19, 96, 27, 100]
                            ]
                        ]
                    ]
                    ]);
                    ?>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>

<div class="site-index">
    
    <div class="congreso-index">
    <?php 
    $gridColumn = [
        
        ['class'=>'kartik\grid\SerialColumn'],
        [
            'attribute'=>'provincia_id', 
            'width'=>'310px',
            'value'=>function ($model, $key, $index, $widget) { 
                return $model->congreso->provincia->Provincia;
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(\backend\models\Provincia::find()->orderBy('Provincia')->asArray()->all(), 'id', 'Provincia'), 
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Any provincia'],
            'group'=>true,  // enable grouping,
            'groupedRow'=>true,                    // move grouped column to a single grouped row
            'groupOddCssClass'=>'kv-grouped-row',  // configure odd group cell css class
            'groupEvenCssClass'=>'kv-grouped-row', // configure even group cell css class
        ],
        /*
        [
            'attribute'=>'congreso_id', 
            'label' => Yii::t('app', 'Congreso'),
            'width'=>'250px',
            'value'=>function ($model, $key, $index, $widget) { 
                return $model->congreso->Nombre;
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(\backend\models\Congreso::find()->orderBy('Nombre')->asArray()->all(), 'id', 'Nombre'), 
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Any congreso'],
            'group'=>true,  // enable grouping
            'subGroupOf'=>1 // supplier column index is the parent group
        ],
        */

        [
            'attribute'=>'congreso_id', 
            'label' => Yii::t('app', 'Congreso'),
            'width'=>'250px',
            'value'=>function ($model, $key, $index, $widget) { 
                return $model->congreso->Nombre;
            },
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(\backend\models\Congreso::find()->orderBy('Nombre')->asArray()->all(), 'id', 'Nombre'), 
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            'filterInputOptions'=>['placeholder'=>'Any congreso'],
            'group'=>true,  // enable grouping
            'subGroupOf'=>1, // supplier column index is the parent group,
            'groupFooter'=>function ($model, $key, $index, $widget) { // Closure method
                return [
                    'mergeColumns'=>[[4]], // columns to merge in summary
                    'content'=>[              // content to show in each summary cell
                        2=>'Total en ' . $model->congreso->Nombre . '',
                        //4=>GridView::F_AVG,
                        //5=>GridView::F_SUM,
                        6=>GridView::F_SUM,
                        //6=>'520',
                    ],
                    'contentFormats'=>[      // content reformatting for each summary cell
                       // 4=>['format'=>'number', 'decimals'=>2],
                       // 5=>['format'=>'number', 'decimals'=>0],
                        6=>['format'=>'number', 'decimals'=>2],
                    ],
                    'contentOptions'=>[      // content html attributes for each summary cell
                       // 4=>['style'=>'text-align:right'],
                       // 5=>['style'=>'text-align:right'],
                        6=>['style'=>'text-align:right'],
                    ],
                    // html attributes for group summary row
                    'options'=>['class'=>'success','style'=>'font-weight:bold;']
                ];
            },
        ],

        [
            'attribute'=>'Titulo',
            'label' => Yii::t('app', 'Presentacion'),
        ],

        [
            'attribute'=>'Fecha_Inicio',
            'label' => Yii::t('app', 'Inicia'),
        ],

        [
            'attribute'=>'Fecha_Final',
            'label' => Yii::t('app', 'Acaba'),
            'pageSummary'=>'Cantidad Total',
            'pageSummaryOptions'=>['class'=>'text-right text-warning'],
        ],

        [
            //'attribute'=>'area_especializacion_id', 
            'label' => Yii::t('app', 'Participantes'),
            'value'=>function ($model, $key, $index, $widget) { 
                return $model->getUsers()->where(['tipo_user_id' => 4])->count();
                //return $model->users->id;
                //return $model::find()->count();
                /*
                return \backend\models\Presentacion::model()->countByAttributes(array(
                    'user_id'=> Yii::app()->user->uid
                ));
                */
            },
            'pageSummary'=>true,
            /*
            'filterType'=>GridView::FILTER_SELECT2,
            'filter'=>ArrayHelper::map(\backend\models\User::find()->orderBy('id')->asArray()->count(), 'id', 'id'), 
            'filterWidgetOptions'=>[
                'pluginOptions'=>['allowClear'=>true],
            ],
            */
        ]
        /*
        [
            'class'=>'kartik\grid\FormulaColumn',
            'header'=>'Participantes',
            
            'value'=>function ($model, $key, $index, $widget) { 
                return $presentacion_user->user->Tipo_user_id;
            },
            
            
            'value'=>function ($model, $key, $index, $widget) { 
                $p = compact('model', 'key', 'index');
                return $widget->col(4, $p) * $widget->col(5, $p);
            },
            'mergeHeader'=>true,
            'width'=>'150px',
            'hAlign'=>'right',
            'format'=>['decimal', 2],
            'pageSummary'=>true
        ],
        */
        

        /*
        [
            'attribute'=>'presentacion_id',
            //'label' => Yii::t('app', 'Presentacion'),
            'value' => function($model){
                return $model->presentacion->Titulo;
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' =>ArrayHelper::map(\backend\models\Presentacion::find()->asArray()->all(), 'id', 'Titulo'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Presentacion', 'id' => 'grid-congreso-search-provincia_id'],
            'pageSummary'=>'Page Summary',
            'pageSummaryOptions'=>['class'=>'text-right text-warning'],
        ],
        */
    ];
    ?>
    <?=GridView::widget([
        'dataProvider'=>$dataProvider,
        //'filterModel'=>$searchModel,
        'showPageSummary'=>true,
        'pjax'=>true,
        'striped'=>true,
        'hover'=>true,
        'panel'=>['type'=>'primary', 'heading'=>'Congresos Activos'],
        'columns'=> $gridColumn,
            /*
            [
                'attribute'=>'unit_price',
                'width'=>'150px',
                'hAlign'=>'right',
                'format'=>['decimal', 2],
                'pageSummary'=>true,
                'pageSummaryFunc'=>GridView::F_AVG
            ],
            [
                'attribute'=>'units_in_stock',
                'width'=>'150px',
                'hAlign'=>'right',
                'format'=>['decimal', 0],
                'pageSummary'=>true
            ],
            [
                'class'=>'kartik\grid\FormulaColumn',
                'header'=>'Amount In Stock',
                'value'=>function ($model, $key, $index, $widget) { 
                    $p = compact('model', 'key', 'index');
                    return $widget->col(4, $p) * $widget->col(5, $p);
                },
                'mergeHeader'=>true,
                'width'=>'150px',
                'hAlign'=>'right',
                'format'=>['decimal', 2],
                'pageSummary'=>true
            ],
            
        ],
        */
        /*
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
            ]) ,
        ],
        */
    ]);
    
    ?>



    </div>
</div>
