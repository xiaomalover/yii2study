<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SphinxTestDocument */

$this->title = 'Create Sphinx Test Document';
$this->params['breadcrumbs'][] = ['label' => 'Sphinx Test Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sphinx-test-document-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
