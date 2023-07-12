<?php

use app\models\Film;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Session $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="session-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'film_id')->dropDownList(
            Film::find()->select(['title', 'id'])->indexBy('id')->column(),
            ['prompt' => 'Select film']
    ) ?>

    <?= $form->field($model, 'datetime')->widget(\kartik\datetime\DateTimePicker::class, []) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
