<?php

/** @var yii\web\View $this */
/** @var app\modules\purchase\models\Purchase $model */

use app\modules\purchase\models\Purchase;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper; ?>

<div class="card mb-3 <?= $model->status == Purchase::STATUS_DRAFT ? ' text-muted' : '' ?>">
    <div class="card-body border-secondary">
        <h5 class="card-title d-flex justify-content-between">
            <?= Html::a(Html::encode($model->title), ['/purchase/purchase/view', 'id' => $model->id], ['class' => 'text-dark stretched-link', 'data-pjax' => 0]); ?>
            <small class="d-block">
                <?= Yii::t('app', 'Budget: <strong>{value}</strong>', ['value' => Yii::$app->formatter->asCurrency($model->budget, 'UAH')]) ?>
            </small>
        </h5>
        <p class="card-text"><?= $model->description; ?></p>
        <p class="card-text text-muted">
            <?= Yii::t('app', 'Status: {status}', ['status' => ArrayHelper::getValue(Purchase::statuses(), $model->status)]) ?>
            | <?= Yii::t('app', 'Views: {views}', ['views' => $model->views]) ?>
            | <?= Yii::t('app', 'Created: {date}', ['date' => Yii::$app->formatter->asDatetime($model->created_at, 'php: d.m.Y h:m:s')]) ?>
            <?= $model->created_at == $model->updated_at ? '': '| ' . Yii::t('app', 'Updated: {date}', ['date' => Yii::$app->formatter->asDatetime($model->updated_at, 'php: d.m.Y h:m:s')]) ?>
        </p>
    </div>
</div>
