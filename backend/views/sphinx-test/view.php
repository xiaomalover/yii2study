<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SphinxTestDocument */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Sphinx Test Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sphinx-test-document-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'group_id',
            'group_id2',
            'date_added',
            'title',
            'content:ntext',
        ],
    ]) ?>

</div>
