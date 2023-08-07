<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = Yii::t('app', 'Login');
?>
<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
<div class="site-login mt-0">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-lg-4">
            <div class="card mb-2">
                <div class="card-body">
                    <h1 class="text-muted text-center mb-4"><?php echo Html::encode($this->title) ?></h1>
                    <?php echo $form->field($model, 'email', [
                            'inputOptions' => ['placeholder' => $model->getAttributeLabel('email')]
                    ])->label(false) ?>
                    <?php echo $form->field($model, 'password')->passwordInput(['placeholder' => $model->getAttributeLabel('password')])->label(false) ?>

                    <?php echo $form->field($model, 'rememberMe')->checkbox() ?>

                    <div class="form-group">
                        <?php echo Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>
                    </div>
                    <div class="text-center">
                        <?php echo Html::a(Yii::t('app', 'Need an account? Sign up.'), ['auth/signup']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
