<?php

namespace app\modules\purchase\models;

use Yii;

/**
 * This is the model class for table "{{%purchase_items}}".
 *
 * @property int $id
 * @property int $purchase_id
 * @property string $description
 * @property int $amount
 * @property int $unit
 *
 * @property Purchase $purchase
 */
class PurchaseItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%purchase_items}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'amount', 'unit'], 'required'],
            [['description'], 'string'],
            [['purchase_id'], 'exist', 'skipOnError' => true, 'targetClass' => Purchase::class, 'targetAttribute' => ['purchase_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'purchase_id' => Yii::t('app', 'Purchase ID'),
            'description' => Yii::t('app', 'Description'),
            'amount' => Yii::t('app', 'Amount'),
            'unit' => Yii::t('app', 'Unit'),
        ];
    }

    public static function itemUnits()
    {
        return [
            0 => 'шт',
            1 => 'кг',
            2 => 'м',
        ];
    }

    /**
     * Gets query for [[Purchase]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchase()
    {
        return $this->hasOne(Purchase::class, ['id' => 'purchase_id']);
    }
}
