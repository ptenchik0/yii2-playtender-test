<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\modules\purchase\models\Purchase $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Purchases'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="purchase-view">

    <div class="d-md-flex justify-content-between">
        <h1 class="mb-5"><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'description:ntext',
            [
                'attribute' => 'budget',
                'value' => function($model){
                    return Yii::$app->formatter->asCurrency($model->budget, 'UAH');
                }
            ],
        ],
    ]) ?>

    <h3 class="mt-5 ml-md-5"><?= Yii::t('app', 'Nomenclatures') ?></h3>

    <?= \yii\grid\GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider(['allModels' => $model->purchaseItems]),
        'options' => ['class' => 'ml-md-5'],
        'columns' => [
                'description:ntext',
                'amount',
                [
                    'attribute' => 'unit',
                    'value' => function($model){
                        return \yii\helpers\ArrayHelper::getValue(\app\modules\purchase\models\PurchaseItem::itemUnits(), $model->unit);
                    }
                ],
        ]
    ]); ?>

</div>
