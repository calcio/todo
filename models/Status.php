<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Status".
 *
 * @property int $id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 *
 * @property TodoList[] $todoLists
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function getAllStatus()
    {
        return Status::find()
                    ->select('id, title')
                    ->orderBy('title')
                    ->all();
    }

    public function getAllStatusAsArray()
    {
        return \yii\helpers\ArrayHelper::map($this->getAllStatus(), 'id', 'title');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTodoLists()
    {
        return $this->hasMany(TodoList::className(), ['status_id' => 'id']);
    }
}
