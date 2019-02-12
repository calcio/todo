<?php
use kartik\grid\GridView;

use yii\helpers\Html;

echo GridView::widget([
    'id' => 'todo-detail',
    'layout' => "{items}\n{pager}",
    'dataProvider'=> $dataProvider,
    'columns' => [
        ['class' => 'kartik\grid\SerialColumn'],
        'task',
        'description:ntext',
        [
            'attribute' => 'status_id',
            'value' => 'status.title',
            'filter' => $statusList,
            'width' => '118px',
            'contentOptions' => [
                'class' => 'text-center'
            ],
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
                'view' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', '#', [
                        'title' => Yii::t('app', 'View'),
                        'value' => $url,
                        'class' => 'viewButton'
                    ]);
                },
                'update' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                        'type' => 'button',
                        'title' => Yii::t('app', 'Update'),
                        'value' => $url,
                        'class' => 'updateButton btn-link'
                    ]);
                },
                'delete' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-trash text-danger"></span>', $url, [
                        'title' => Yii::t('app', 'Delete'),
                        'data-confirm' => sprintf(
                            'Deseja deletar a tarefa: %s?',
                            $model->task
                        ),
                        'data-method' => 'POST'
                    ]);
                }
            ]
        ],
    ],
    'pjax'=>true,
]);
?>
