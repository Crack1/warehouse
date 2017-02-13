<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblOsig */

$this->title = 'Edit Category ';
$this->params['breadcrumbs'][] = ['label' => 'Categories List', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Details', 'url' => ['view', 'id' => $model->id_category]];
$this->params['breadcrumbs'][] = 'Edit Category';
?>
<div class="tbl-osig-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
