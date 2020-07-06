<?php

use yii\db\Migration;

/**
 * Class m200703_144027_create_junction_trait_retail
 */
class m200703_144027_create_junction_trait_retail extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("{{%retail_trait}}",[
            'retail_id'=>$this->integer(),
            'trait_id'=>$this->integer()
        ]);

        $this->addForeignKey("t_r","{{%retail_trait}}",'retail_id',"{{%retailobj}}",
            'id','CASCADE','CASCADE');
        $this->addForeignKey("t_t","{{%retail_trait}}",'trait_id',"{{%traits}}",
            'id','CASCADE','CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200703_144027_create_junction_trait_retail cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200703_144027_create_junction_trait_retail cannot be reverted.\n";

        return false;
    }
    */
}
