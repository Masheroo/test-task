<?php

/**
 * @var yii\web\View $this
 * @var array $sessions
 */


$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php foreach ($sessions as $session): ?>
        <p><?= \yii\helpers\Html::encode($session->datetime) ?></p>
        <p><?= \yii\helpers\Html::encode($session->cost) ?> rub</p>
        <div class="film">
            <p><?= \yii\helpers\Html::encode($session->film->title) ?> </p>
            <p><?= \yii\helpers\Html::encode($session->film->description) ?> </p>
            <p><?= \yii\helpers\Html::encode($session->film->duration) ?> </p>
            <p><?= \yii\helpers\Html::encode($session->film->age_restriction) ?> </p>
            <img src="uploads/film/<?php echo $session->film->id . '.' . $session->film->image ?>" alt="">

        </div>
    <?php endforeach; ?>

</div>
