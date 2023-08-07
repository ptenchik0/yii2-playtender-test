<?php

use app\modules\purchase\models\Purchase;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\purchase\models\search\PurchaseSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */


$this->title = $this->context->action->id == 'own' ? Yii::t('app', 'My Purchases') : Yii::t('app', 'Purchases');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="purchase-index">

    <div class="d-flex justify-content-between align-items-center">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a(Yii::t('app', 'Create Purchase'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => 'my-3'],
        'summaryOptions' => ['class' => 'mb-2 text-muted'],
        'itemView' => '_item'
    ]) ?>

    <?php Pjax::end(); ?>

</div>
