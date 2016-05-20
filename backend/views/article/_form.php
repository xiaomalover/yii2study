<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use trntv\filekit\widget\Upload;
use yii\web\JsExpression;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'body')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'zh_cn',
            'minHeight' => 200,
            'plugins' => [
                'clips',
                'table',
                'video',
                // 'textdirection',
                'fontcolor',
                'fontsize',
                // 'fontfamily',
                'fullscreen',
            ],
            'imageUpload' => Url::to(['/file-storage/upload-imperavi']),
        ],
    ]);?>

    <?= $form->field($model, 'view')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?php
        echo $form->field($model, 'thumb_path')->widget(
            Upload::className(),
            [
                'url' => ['/file-storage/upload'],
                'acceptFileTypes' => new JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
                'maxFileSize' => 5000000, // 5 MiB
            ]
        );
    ?>

    <?php echo $form->field($model, 'attachments')->widget(
        Upload::className(),
        [
            'url' => ['/file-storage/upload'],
            'sortable' => true,
            'maxFileSize' => 10000000, // 10 MiB
            'maxNumberOfFiles' => 10
        ]);
    ?>

    <!-- <?= $form->field($model, 'author_id')->textInput() ?> -->

    <!-- <?= $form->field($model, 'updater_id')->textInput() ?> -->

    <?= $form->field($model, 'status')->textInput() ?>

    <!-- <?= $form->field($model, 'published_at')->textInput() ?> -->

    <!-- <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
