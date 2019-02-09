<?php

use yii\db\Migration;

/**
 * Class m190207_173846_alter_table_todo_list
 */
class m190207_173846_alter_table_todo_list extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'idx-todo-staus-id',
            'TodoList',
            'status_id'
        );
        $this->addForeignKey(
            'fk-todo-staus-id',
            'TodoList',
            'status_id',
            'Status',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190207_173846_alter_table_todo_list cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190207_173846_alter_table_todo_list cannot be reverted.\n";

        return false;
    }
    */
}
