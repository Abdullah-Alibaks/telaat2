<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Studenten $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="studenten-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'klas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'minuten')->textInput() ?>

    <?= $form->field($model, 'reden')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
