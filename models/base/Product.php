<?php

namespace app\models\base;

/**
 * This is the base model class for table "eco_product".
 *
 * @property integer $id
 * @property integer $price
 *
 * @property \app\models\InvoiceLine[] $invoiceLines
 * @property \app\models\OrderLine[] $orderLines
 * @method static \yii\db\ActiveQuery|\app\models\Product|null find($q=null)
 */
abstract class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eco_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
			[['price'], 'required'],
			[['price'], 'integer']
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveRelation
     */
    public function getInvoiceLines()
    {
        return $this->hasMany(\app\models\InvoiceLine::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveRelation
     */
    public function getOrderLines()
    {
        return $this->hasMany(\app\models\OrderLine::className(), ['product_id' => 'id']);
    }
}
