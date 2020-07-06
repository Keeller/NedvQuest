<?php

use yii\db\Migration;

/**
 * Class m200703_143035_create_image
 */
class m200703_143035_create_image extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("{{%images}}",[
            'id'=>$this->primaryKey(),
            'path'=>$this->string(255),
            'retail_id'=>$this->integer()
        ]);

        $this->addForeignKey("ret_image","{{%images}}","retail_id",
            "{{%retailobj}}","id",'CASCADE','CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200703_143035_create_image cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200703_143035_create_image cannot be reverted.\n";

        return false;
    }
    */
}
