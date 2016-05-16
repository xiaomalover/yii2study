<?php

use yii\db\Migration;

/**
 * Handles the creation for table `mysql_fb`.
 */
class m160516_021927_create_mysql_fb extends Migration
{
    /**
     * The count of the sub table.
     * @var integer
     */
    private $count = 100;

    /**
     * Create tables
     * MyISAM engine does not support transaction
     */
    public function up()
    {
        $unions = '';
        //Create sub table
        for ($i = 1; $i <= $this->count; $i++) {
            $this->createTable("{{%user_$i}}", [
                'id' => $this->primaryKey(),
                'name' => $this->string(50),
                'sex' => $this->smallInteger()->notNull()->defaultValue(0),
            ], 'ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');
            $unions = $unions ? $unions . ", `user_$i`" : "user_$i";
        }

        //Create union table
        $this->createTable('{{%alluser}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50),
            'sex' => $this->smallInteger()->notNull()->defaultValue(0),
        ], "ENGINE=MRG_MyISAM DEFAULT CHARSET=utf8
            UNION=($unions) AUTO_INCREMENT=1"
        );

        //Insert some test data
        for ($i = 1; $i <= $this->count; $i++) {
            $this->execute("INSERT INTO {{%user_$i}} VALUES('', 'name$i', $i%2)");
        }
    }

    /**
     * Drop down tables
     */
    public function down()
    {
        //Drop sub table
        for ($i = 1; $i <= $this->count; $i++) {
            $this->dropTable("{{%user_$i}}");
        }
        //Drop union table
        $this->dropTable('{{%alluser}}');
    }
}
