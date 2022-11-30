<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Studenten $model */

$this->title = 'Create Studenten';
$this->params['breadcrumbs'][] = ['label' => 'Studentens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="studenten-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
