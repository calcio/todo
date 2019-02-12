<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $searchModel app\models\TodoListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'ToDo List');
$this->params['breadcrumbs'][] = $this->title;

Modal::begin([
    'id' => 'modalFormTodoListContent',
    'header' => '<h1>' . Yii::t('app', 'Create Todo List') . '</h1>',
    'size' => 'modal-md',
]);
echo '<div id="formTodoListContent"></div>';
Modal::end();

Modal::begin([
    'id' => 'modalFormTodoListContentUpdate',
    'header' => '<h1>' . Yii::t('app', 'Update Todo List') . '</h1>',
    'size' => 'modal-md',
]);
echo '<div id="formTodoListContentUpdate"></div>';
Modal::end();

Modal::begin([
    'id' => 'modalFormTodoListContentView',
    'header' => '<h1>' . Yii::t('app', 'Detail') . '</h1>',
    'size' => 'modal-md',
]);
echo '<div id="formTodoListContentView"></div>';
Modal::end();
?>

<div class="todo-list-index">
    <?php Pjax::begin(); ?>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 alert alert-warning">
            <span class="glyphicon glyphicon-expand"></span> Clique nesse ícone para expandir as tarefas
        </div>
    </div>

    <?= GridView::widget([
        'id' => 'todo',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'showPageSummary' => false,
        'striped' => true,
        'hover' => true,
        'panel' => ['type' => 'info', 'heading' => Html::encode($this->title)],
        'toolbar' =>  [
            ['content' =>
                Html::button('<i class="glyphicon glyphicon-plus"></i>', [
                    'type' => 'button',
                    'title' => Yii::t('app', 'Create Todo List'),
                    'value' => Url::to(['todo-list/create']),
                    'class' => 'btn btn-success',
                    'id' => 'createButton'
                ]) . ' ' .
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['index'], [
                    'class' => 'btn btn-default',
                    'title' => Yii::t('app', 'Reset Grid')
                ]),
            ],
        ],
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'width' => '50px',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model, $key, $index, $column) {
                    $status = new app\models\Status();
                    $searchModel = new app\models\TodoListDetailSearch();

                    $searchModel->parent_id = $model->id;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_todo-details', [
                        'dataProvider' => $dataProvider,
                        'statusList' => $status->getAllStatusAsArray(),
                    ]);
                },
                'headerOptions' => ['class' => 'kartik-sheet-style'],
                'expandOneOnly' => true,
            ],
            [
                'attribute' => 'id',
                'headerOptions' => [
                    'class' => 'col-sm-1 text-center'
                ],
                'contentOptions' => [
                    'class' => 'text-center'
                ],
            ],
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
                'class' => 'yii\grid\ActionColumn',
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
        ]
    ]); ?>
    <?php Pjax::end(); ?>

</div>
