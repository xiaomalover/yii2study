<?php
use kop\y2sp\ScrollPager;
use yii\widgets\ListView;

$this->title = '文章列表';
?>

<div class="row">
    <?php
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'itemView' => '_item_index',
            'layout' => '{items}{pager}',
            'emptyText' => '暂无数据',
            'pager' => [
                'class' => ScrollPager::className(),
                'enabledExtensions' => [
                    ScrollPager::EXTENSION_TRIGGER,
                    ScrollPager::EXTENSION_SPINNER,
                    ScrollPager::EXTENSION_NONE_LEFT,
                    ScrollPager::EXTENSION_PAGING,
                ],
                'triggerText' => '<a href="javascript:void(0)" class="dm-homeld text-center">继续向下加载更多</a>',
                'triggerTemplate' => '<div class="col-md-12" style="text-align: center; cursor: pointer;"><a class="btn-group-justified btn-xs button button-3d button-primary button-pill">{text}</a></div>',
                'triggerOffset' => 20,
                'negativeMargin' => 10,
            ],
        ]);
    ?>
</div>