<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $searchModel app\models\TodoListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'ToDo List');
$this->params['breadcrumbs'][] = $this->title;

Modal::begin([
    'header' => '<h1>' . Yii::t('app', 'Create Todo List') . '</h1>',
    'id' => 'modalFormTodoListContent',
    'size' => 'modal-md',
]);
echo '<div id="formTodoListContent"></div>';
Modal::end();
?>

<div class="todo-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button(Yii::t('app', 'Create Todo List'), ['value' => Url::to(['todo-list/create']), 'class' => 'btn btn-success', 'id' => 'createButton']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'parent_id',
            'user_id',
            'status_id',
            'task',
            //'description:ntext',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
