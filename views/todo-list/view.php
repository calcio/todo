<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TodoList */
?>
<div class="todo-list-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'parent_id',
            'status_id',
            'task',
            'description:ntext',
        ],
    ]) ?>

</div>
