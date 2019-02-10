<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TodoList */

$this->title = Yii::t('app', 'Create Todo List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Todo Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-list-create">

    <?= $this->render('_form', [
        'model' => $model,
        'usersList' => $usersList,
    ]) ?>

</div>
