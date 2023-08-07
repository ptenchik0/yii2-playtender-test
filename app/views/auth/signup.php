<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = Yii::t('app', 'Sign up');

?>

<?php $form = ActiveForm::begin([
    'id' => 'signup-form',
    'enableAjaxValidation' => true,
]); ?>
<div class="signup mt-0">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-lg-4">
            <div class="card mb-2">
                <div class="card-body">
                    <h1 class="text-muted text-center"><?php echo Html::encode($this->title) ?></h1>
                    <?php echo $form->field($model, 'first_name') ?>
                    <?php echo $form->field($model, 'last_name') ?>
                    <?php echo $form->field($model, 'email') ?>
                    <?php echo $form->field($model, 'password')->passwordInput() ?>
                    <?php echo $form->field($model, 'password_confirm')->passwordInput() ?>

                    <div class="form-group">
                        <?php echo Html::submitButton(Yii::t('app', 'Sign up'), ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'signup-button']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
