<?php

use yii\db\Migration;

/**
 * Class m190207_135352_todo_list
 */
class m190207_135352_todo_list extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('TodoList', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer(),
            'user_id' => $this->integer()->notNull(),
            'status_id' => $this->integer()->notNull()->defaultValue(1),
            'task' => $this->string()->notNull(),
            'description' => $this->text(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->notNull(),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190207_135352_todo_list cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190207_135352_todo_list cannot be reverted.\n";

        return false;
    }
    */
}
