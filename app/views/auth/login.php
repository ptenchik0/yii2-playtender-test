<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = Yii::t('app', 'Login');

?>
<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
<div class="site-login mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-4">
            <div class="card mb-2">
                <div class="card-body">
                    <h1 class="text-muted text-center"><?php echo Html::encode($this->title) ?></h1>
                    <?php echo $form->field($model, 'email') ?>
                    <?php echo $form->field($model, 'password')->passwordInput() ?>

                    <div class="d-flex justify-content-between">
                        <?php echo $form->field($model, 'rememberMe')->checkbox() ?>
                    </div>

                    <div class="form-group">
                        <?php echo Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>
                    </div>
                    <div class="form-group text-center">
                        <?php echo Html::a(Yii::t('app', 'Need an account? Sign up.'), ['auth/signup']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
