<?php
use kartik\grid\GridView;

use yii\helpers\Html;

echo GridView::widget([
    'id' => 'todo-detail',
    'layout' => "{items}\n{pager}",
    'dataProvider'=> $dataProvider,
    'columns' => [
        [
            'attribute' => 'status_id',
            'value' => 'status.title',
            'filter' => $statusList,
            'width' => '118px',
            'contentOptions' => [
                'class' => 'text-center'
            ],
        ],
        'task',
        'description:ntext',
        [
            'class' => '\kartik\grid\CheckboxColumn',
            'rowSelectedClass' => GridView::TYPE_WARNING
        ],
        [
            'class' => 'kartik\grid\ActionColumn',
            'header' => 'Actions',
            'headerOptions' => [
                'class' => 'col-sm-1 text-center'
            ],
            'contentOptions' => [
                'class' => 'text-center'
            ],
            'buttons' => [
                'delete' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash text-danger"></span>', $url, [
                        'name' => 'Delete',
                        'data-confirm' => sprintf(
                            'Deseja deletar tarefa: %s?',
                            $model->task
                        ),
                        'data-method' => 'POST'
                    ]);
                },
            ]
        ],
    ],
    'pjax'=>true,
]);
?>
