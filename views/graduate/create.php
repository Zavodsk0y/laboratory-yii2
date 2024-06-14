<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Graduate $model */

$this->title = 'Добавить степень';
$this->params['breadcrumbs'][] = ['label' => 'Graduates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="graduate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
