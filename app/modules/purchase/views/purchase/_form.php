<?php

use app\modules\purchase\models\Purchase;
use app\modules\purchase\models\PurchaseItem;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\modules\purchase\models\Purchase $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="purchase-form">

    <?php $form = ActiveForm::begin([
        'id' => 'create-purchase',
        'layout' => 'horizontal'
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'budget')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status', [
        'inputOptions' => ['class' => $model->status == Purchase::STATUS_DRAFT ? 'form-control': 'form-control disabled']
    ])->dropDownList(\app\modules\purchase\models\Purchase::statuses()) ?>

    <div class="card my-5">
        <div class="card-header"><h4><?= Yii::t('app', 'Nomenclatures')?></h4></div>
        <div class="card-body">
            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $items[0],
                'formId' => $form->id,
                'formFields' => [
                    'amount',
                    'unit',
                    'description',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
                <?php foreach ($items as $i => $item): ?>
                    <div class="item card"><!-- widgetBody -->
                        <div class="card-header d-flex justify-content-between">
                            <h3 class="panel-title"><?= Yii::t('app', 'Nomenclature')?></h3>
                            <div class="">
                                <button type="button" class="add-item btn btn-success btn-xs"><?= Yii::t('app', 'Add'); ?></button>
                                <button type="button" class="remove-item btn btn-danger btn-xs"><?= Yii::t('app', 'Delete'); ?></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            // necessary for update action.
                            if (!$item->isNewRecord) {
                                echo Html::activeHiddenInput($item, "[{$i}]id");
                            }
                            ?>
                            <?= $form->field($item, "[{$i}]amount")->textInput() ?>
                            <?= $form->field($item, "[{$i}]unit")->dropDownList(PurchaseItem::itemUnits()) ?>
                            <?= $form->field($item, "[{$i}]description")->textarea(['rows' => 2]) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

