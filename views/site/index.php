<?php

/**
 * @var yii\web\View $this
 * @var array $sessions
 */


$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php foreach ($sessions as $session): ?>
        <?php $film = $session->getFilm()->one() ?>
        <p><?= \yii\helpers\Html::encode($session->datetime) ?></p>
        <p><?= \yii\helpers\Html::encode($session->cost) ?> rub</p>
        <div class="film">
            <p><?= \yii\helpers\Html::encode($film->title) ?> </p>
            <p><?= \yii\helpers\Html::encode($film->description) ?> </p>
            <p><?= \yii\helpers\Html::encode($film->duration) ?> </p>
            <p><?= \yii\helpers\Html::encode($film->age_restriction) ?> </p>
            <img src="uploads/film/<?php echo $film->id . '.' . $film->image ?>" alt="">

        </div>
    <?php endforeach; ?>

</div>
