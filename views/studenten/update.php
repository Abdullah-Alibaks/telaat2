<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Studenten $model */

$this->title = 'Update Studenten: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Studentens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="studenten-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
