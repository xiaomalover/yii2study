<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $editor
 * @property string $created_at
 * @property string $published_at
 * @property integer $views
 * @property integer $status
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['created_at', 'published_at', 'views', 'status'], 'integer'],
            [['title'], 'string', 'max' => 64],
            [['editor'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'editor' => 'Editor',
            'created_at' => 'Created At',
            'published_at' => 'Published At',
            'views' => 'Views',
            'status' => 'Status',
        ];
    }
}
