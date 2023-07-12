<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Film $model */

$this->title = 'Create Film';
$this->params['breadcrumbs'][] = ['label' => 'Films', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="film-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>id = <?= Html::encode(isset($model->id) ? 'y' : 'n') ?></p>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
