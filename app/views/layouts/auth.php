<?php $this->beginContent('@app/views/layouts/base.php'); ?>
    <main id="main" class="d-flex h-100 align-items-center mt-5 pt-5" role="main">
        <div class="container">
            <?= $content ?>
        </div>
    </main>
<?php $this->endContent() ?>