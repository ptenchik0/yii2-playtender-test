<?php

use yii\bootstrap4\Alert;
use yii\bootstrap4\Breadcrumbs;

?>

<?php $this->beginContent('@app/views/layouts/base.php'); ?>
<main id="main" class="flex-shrink-0 mt-5 pt-5 mb-5" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?php if (!empty(Yii::$app->session->allFlashes)): ?>
            <?= Alert::widget() ?>
        <?php endif ?>
        <?= $content ?>
    </div>
</main>
<?php $this->endContent() ?>
