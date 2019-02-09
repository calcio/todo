<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TodoList */

$this->title = Yii::t('app', 'ToDo List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Todo Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'usersList' => $usersList,
    ]) ?>

</div>
