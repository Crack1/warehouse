<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblOsig */

$this->title = 'New category';
$this->params['breadcrumbs'][] = ['label' => 'Categories list', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-osig-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
