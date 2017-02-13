<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_product_categories".
 *
 * @property integer $product
 * @property integer $category
 *
 * @property TblProducts $product0
 * @property TblCategories $category0
 */
class TblProductCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_product_categories';
    }
  

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product', 'category'], 'required'],
            [['product', 'category'], 'integer'],
            [['product'], 'exist', 'skipOnError' => true, 'targetClass' => TblProducts::className(), 'targetAttribute' => ['product' => 'id_product']],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => TblCategories::className(), 'targetAttribute' => ['category' => 'id_category']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product' => 'Product',
            'category' => 'Category',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct0()
    {
        return $this->hasOne(TblProducts::className(), ['id_product' => 'product']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(TblCategories::className(), ['id_category' => 'category']);
    }
}
