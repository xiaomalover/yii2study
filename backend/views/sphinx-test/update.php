<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SphinxTestDocument */

$this->title = 'Update Sphinx Test Document: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Sphinx Test Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sphinx-test-document-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
