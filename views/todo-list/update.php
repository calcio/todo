<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TodoList */

$this->title = Yii::t('app', 'Update Todo List: {name}', [
    'name' => $model->task,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Todo Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->task, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="todo-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'usersList' => $usersList,
        'statusList' => $statusList,
    ]) ?>

</div>
