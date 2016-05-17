<?php

use yii\db\Migration;

/**
 * This will create `document` and `tags` table for sphinx test
 * Table is designed as same as the sphinx documentation
 */
class m160507_123635_create_sphinx_test extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%documents}}', [
            'id' => $this->primaryKey()->comment('ID'),
            'group_id' => $this->integer()->notNull()->comment('分组'),
            'group_id2' => $this->integer()->notNull()->comment('分组2'),
            'date_added' => $this->datetime()->notNull()->comment('添加时间'),
            'title' => $this->string()->notNull()->comment("标题"),
            'content' => $this->text()->notNull()->comment("内容"),
        ], "ENGINE=MyISAM DEFAULT CHARSET=utf8");
        $this->execute("INSERT INTO {{%documents}} VALUES
            ('1', '1', '5', '2016-05-10 15:14:58', 'test one xiaoma', 'this is my test document number one. also 小checking马 search within phrases.'),
            ('2', '1', '6', '2016-05-10 15:14:58', 'test two', 'this is my test document number two'),
            ('3', '2', '7', '2016-05-10 15:14:58', 'another doc', 'this is another group 小马'),
            ('4', '2', '8', '2016-05-10 15:14:58', 'doc number four', 'this is to test groups xiaoma小')");

        $this->createTable('{{%tags}}', [
            'docid' => $this->integer()->notNull()->comment('文档ID'),
            'tagid' => $this->integer()->notNull()->comment('标签ID'),
        ], "ENGINE=MyISAM DEFAULT CHARSET=utf8");
        $this->createIndex('docid', '{{%tags}}', ['docid', 'tagid'], true);
        $this->execute("INSERT INTO {{%tags}} VALUES
            ('1', '1'),('1', '3'),('1', '5'),('1', '7'),('2', '2'),
            ('2', '4'),('2', '6'),('3', '15'),('4', '7'),('4', '40')");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%documents}}');
        $this->dropTable('{{%tags}}');
    }
}
