<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\user */

$this->title = 'User edit ';
$this->params['breadcrumbs'][] = ['label' => 'User list', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'User details', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'User edit';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model2' => $model2,
    ]) ?>

</div>
