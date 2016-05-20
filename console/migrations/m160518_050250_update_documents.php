<?php

use yii\db\Migration;

class m160518_050250_update_documents extends Migration
{
    public function up()
    {
        $this->addColumn('{{%documents}}', 'thumb', 'string(128) not null');
        $this->addCommentOnColumn('{{%documents}}', 'thumb', '缩略图');
    }

    public function down()
    {
        $this->dropColumn('{{%documents}}', 'thumb');
    }
}
