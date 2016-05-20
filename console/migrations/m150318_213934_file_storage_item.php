<?php

use console\migrations\Migration;

class m150318_213934_file_storage_item extends Migration
{
    public function up()
    {
        $this->createTable('{{%file_storage_item}}', [
            'id' => $this->primaryKey(),
            'component' => $this->string()->notNull(),
            'path' => $this->string(1024)->notNull(),
            'type' => $this->string(),
            'size' => $this->integer(),
            'name' => $this->string(),
            'upload_ip' => $this->string(15),
            'created_at' => $this->integer()->notNull()
        ], $this->tableOptions);
    }
    public function down()
    {
        $this->dropTable('{{%file_storage_item}}');
    }
}
