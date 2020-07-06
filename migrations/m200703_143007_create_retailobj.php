<?php

use yii\db\Migration;

/**
 * Class m200703_143007_create_retailobj
 */
class m200703_143007_create_retailobj extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("{{%retailobj}}",[
            'id'=>$this->primaryKey(),
            'description'=>$this->text(),
            'adress'=>$this->string(255),
            'x'=>$this->integer(),
            'y'=>$this->integer(),
            'z'=>$this->integer()
                ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200703_143007_create_retailobj cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200703_143007_create_retailobj cannot be reverted.\n";

        return false;
    }
    */
}
