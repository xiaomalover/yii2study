<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
?>

<div class="col-sm-6 col-md-4 col-lg-3 ">
    <div class="thumbnail" style="height: 334px;">
        <a href="#" title="<?=$model->title?>" target="_blank">
            <img class="lazy" src="<?=Yii::$app->fileStorage->baseUrl.'/'.$model->thumb?>" style="height:150px;">
        </a>
        <div class="caption">
            <h3>
                <a href="#" title="<?=$model->title?>" target="_blank"><?=$model->title?><br></a>
            </h3>
            <p>这里是内容这里是内容这里是内容这里是内容这里是内容这里是内容这里是内容这里是内容这里是内容这里是内容这里是内容这里是内容这里是内容这里是内容这里是内容</p>
        </div>
    </div>
</div>
