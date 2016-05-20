<?php

use console\migrations\Migration;

class m160518_055836_create_article extends Migration
{
    /**
     * SafeUp function will use transaction
     * But the sql engine must support transaction
     */
    public function safeUp()
    {
        //Create article category table
        $this->createTable('{{%article_category}}', [
            'id' => $this->primaryKey()->comment('分类ID'),
            'slug' => $this->string()->notNull()->comment('标签'),
            'title' => $this->string(128)->notNull()->comment('标题'),
            'body' => $this->text()->comment('内容'),
            'parent_id' => $this->integer()->comment('父类ID'),
            'status' => $this->smallInteger()->notNull()->defaultValue(0)->comment('状态'),
            'created_at' => $this->integer()->comment('创建时间'),
            'updated_at' => $this->integer()->comment('修改时间'),
        ], $this->tableOptions);

        //Create article table
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey()->comment('文章ID'),
            'slug' => $this->string()->notNull()->comment('标签'),
            'title' => $this->string(128)->notNull()->comment('标题'),
            'body' => $this->text()->comment('内容'),
            'view' => $this->string()->comment('视图模板'),
            'category_id' => $this->integer()->comment('文章分类ID'),
            'thumb' => $this->string()->comment('缩略图'),
            'author_id' => $this->integer()->comment('作者ID'),
            'updater_id' => $this->integer()->comment('修改者ID'),
            'status' => $this->smallInteger()->notNull()->defaultValue(0)->comment('状态'),
            'published_at' => $this->integer()->comment('发布时间'),
            'created_at' => $this->integer()->comment('创建时间'),
            'updated_at' => $this->integer()->comment('修改时间'),
        ], $this->tableOptions);

        //Create article attachment table
        $this->createTable('{{%article_attachment}}', [
            'id' => $this->primaryKey()->comment('文章附件ID'),
            'article_id' => $this->integer()->notNull()->comment('文章ID'),
            'path' => $this->string()->comment('路径'),
            'type' => $this->string()->comment('文件类型'),
            'size' => $this->integer()->comment('文件大小'),
            'name' => $this->string()->comment('文件名'),
            'created_at' => $this->integer()->comment('创建时间'),
        ], $this->tableOptions);

        //Add foreignKeies
        $this->addForeignKey('fk_article_attachment_article', '{{%article_attachment}}', 'article_id', '{{%article}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_article_author', '{{%article}}', 'author_id', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_article_updater', '{{%article}}', 'updater_id', '{{%user}}', 'id', 'set null', 'cascade');
        $this->addForeignKey('fk_article_category', '{{%article}}', 'category_id', '{{%article_category}}', 'id');
        $this->addForeignKey('fk_article_category_section', '{{%article_category}}', 'parent_id', '{{%article_category}}', 'id', 'cascade', 'cascade');
    }

    /**
     * SafeDown function will use transaction
     * But the sql engine must support transaction
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_article_attachment_article', '{{%article_attachment}}');
        $this->dropForeignKey('fk_article_author', '{{%article}}');
        $this->dropForeignKey('fk_article_updater', '{{%article}}');
        $this->dropForeignKey('fk_article_category', '{{%article}}');
        $this->dropForeignKey('fk_article_category_section', '{{%article_category}}');
        $this->dropTable('{{%article_attachment}}');
        $this->dropTable('{{%article}}');
        $this->dropTable('{{%article_category}}');
    }
}
