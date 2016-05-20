<?php

namespace common\models;

use trntv\filekit\behaviors\UploadBehavior;
use Yii;

/**
 * This is the model class for table "{{%documents}}".
 *
 * @property integer $id
 * @property integer $group_id
 * @property integer $group_id2
 * @property string $date_added
 * @property string $title
 * @property string $content
 */
class SphinxTestDocument extends \yii\db\ActiveRecord
{
    public $thumb_img;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%documents}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_id', 'group_id2', 'date_added', 'title', 'content'], 'required'],
            [['group_id', 'group_id2'], 'integer'],
            [['date_added'], 'safe'],
            [['content', 'thumb'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['thumb_img'], 'safe'],
        ];
    }

    /**
     * When use yii2-file-kit to upload
     * file folowing behavior should been added
     */
    public function behaviors()
    {
        return [
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'thumb_img',
                'pathAttribute' => 'thumb',
                'baseUrlAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group ID',
            'group_id2' => 'Group Id2',
            'date_added' => 'Date Added',
            'title' => 'Title',
            'content' => 'Content',
        ];
    }
}
