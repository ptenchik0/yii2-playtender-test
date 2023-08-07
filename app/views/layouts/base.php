<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

\yii\web\YiiAsset::register($this);

//AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-md-auto'],
        'items' => [
            ['label' => Yii::t('app', 'Purchases'), 'url' => ['/purchase/purchase/index']],
            ['label' => Yii::t('app', 'My Purchases'), 'url' => ['/purchase/purchase/own'], 'visible' => !Yii::$app->user->isGuest],
            Yii::$app->user->isGuest ? ['label' => Yii::t('app', 'Login'), 'url' => ['/auth/login']] :
                [
                    'label' =>  Yii::t('app', 'Logout ({fullname})', ['fullname' => Yii::$app->user->identity->fullname]) ,
                    'url' => ['/auth/logout'],
                    'linkOptions' => [
                        'data' => ['method' => 'post']
                    ]
                ],
            ['label' => Yii::t('app', 'Sign up'), 'url' => ['/auth/signup'], 'visible' => Yii::$app->user->isGuest]
        ]
    ]);
    NavBar::end();
    ?>
</header>

<?= $content ?>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6">&copy; Oleg K <?= date('Y') ?></div>
            <div class="col-md-6 text-right"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
