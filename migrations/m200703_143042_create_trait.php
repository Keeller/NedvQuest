<?php

use yii\db\Migration;

/**
 * Class m200703_143042_create_trait
 */
class m200703_143042_create_trait extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable("{{%traits}}",[
            'id'=>$this->primaryKey(),
            'name'=>$this->string(255)
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200703_143042_create_trait cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200703_143042_create_trait cannot be reverted.\n";

        return false;
    }
    */
}
