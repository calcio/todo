<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TodoList".
 *
 * @property int $id
 * @property int $parent_id
 * @property int $user_id
 * @property int $status_id
 * @property string $task
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Status $status
 */
class TodoList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TodoList';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'user_id', 'status_id'], 'integer'],
            [['user_id', 'task'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['task'], 'string', 'max' => 255, 'min' => 3],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'parent_id' => Yii::t('app', 'Tarefa Pai'),
            'user_id' => Yii::t('app', 'Usuário'),
            'status_id' => Yii::t('app', 'Status'),
            'task' => Yii::t('app', 'Task'),
            'description' => Yii::t('app', 'Descrição'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function getAllParentToDo()
    {
        return TodoList::find()
            ->select('id, task')
            ->where(['parent_id' => null])
            ->orderBy('task')
            ->all();
    }

    public function getAllParentToDoAsArray()
    {
        return yii\helpers\ArrayHelper::map($this->getAllParentToDo(), 'id', 'task');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
