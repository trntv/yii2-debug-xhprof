<?php
/* @var $this yii\web\View */
/* @var $panel yii\debug\panels\ConfigPanel */
use yii\grid\GridView;
$this->registerCss('.fn-row{cursor:pointer}')
?>
<h1>Xhprof Report</h1>
<?php
    $columns = [
        ['class' => 'yii\grid\SerialColumn'],
        'fn',
        'ct',
        ['attribute'=>'w_ct', 'format'=>['percent', 2]],
        'wt',
        ['attribute'=>'w_wt', 'format'=>['percent', 2]],
        'cpu',
        ['attribute'=>'w_cpu', 'format'=>['percent', 2]],
        'mu',
        ['attribute'=>'w_mu', 'format'=>['percent', 2]],
        'pmu'
    ]
?>
<?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'id' => 'xhprof-panel-detailed-grid',
    'options' => ['class' => 'detail-grid-view'],
    'filterModel' => $searchModel,
    'filterUrl' => $panel->getUrl(),
    'emptyText'=>'There is no xhprof data on this request. You don\'t have xhprof installed or didn\'t run profiling with "_xhprof=1" query parameter or cookie key.',
    'afterRow'=>function($model, $key, $index, $grid) use($panel, $columns){
        $content = '';
        if($model['parents']){
            $allModels = [];
            foreach($model['parents'] as $parent){
                $allModels[] = $panel->getModel($parent);
            }
            $content .= \yii\helpers\Html::beginTag('tr', [
                'class'=>'panel-collapse collapse',
                'id'=>'xhprof-panel-detailed-grid-parent-'.$index,
            ]);
            $content .= \yii\helpers\Html::beginTag('td', ['colspan'=>count($columns)]);
            $content .= GridView::widget([
                'dataProvider'=>new \yii\data\ArrayDataProvider([
                    'allModels'=>$allModels,
                    'pagination' => false,
                    'sort' => [
                        'attributes' => ['w_wt'],
                        'defaultOrder' => [
                            'w_wt' => SORT_DESC,
                        ],
                    ],
                ]),

                'columns' => $columns,
                'options' => ['class' => 'detail-grid-view'],
            ]);
            $content .= \yii\helpers\Html::endTag('td');
            $content .= \yii\helpers\Html::endTag('tr');
        }
        return $content;
    },
    'rowOptions'=>function($model, $key, $index, $grid){
        return [
            'class'=>'fn-row',
            'data'=>['toggle'=>'collapse', 'target'=>'#xhprof-panel-detailed-grid-parent-'.$index]
        ];
    },
    'columns' => $columns
]);
?>