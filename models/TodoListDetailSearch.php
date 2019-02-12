<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TodoList;

/**
 * TodoListSearch represents the model behind the search form of `app\models\TodoList`.
 */
class TodoListDetailSearch extends TodoList
{
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TodoList::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        // grid filtering conditions
        $query->andFilterWhere([
            'parent_id' => $this->parent_id,
        ]);

        return $dataProvider;
    }
}
