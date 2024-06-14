<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Graduate $model */

$this->title = 'Update Graduate: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Graduates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="graduate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
