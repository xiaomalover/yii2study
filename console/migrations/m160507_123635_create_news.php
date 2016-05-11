<?php

use console\migrations\Migration;

/**
 * Handles the creation for table `news`.
 */
class m160507_123635_create_news extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey()->comment('ID'),
            'title' => $this->string(64)->comment('标题'),
            'content' => $this->text()->comment('内容'),
            'editor' => $this->string(32)->comment('编辑'),
            'created_at' => $this->integer()->unsigned()->comment("创建时间"),
            'published_at' => $this->integer()->unsigned()->comment("发布时间"),
            'views' => $this->integer()->comment('浏览次数'),
            'status' => $this->smallInteger()->comment('状态：0未发布; 1已发布; 2已删除'),
        ], $this->tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('news');
    }
}
