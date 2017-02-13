<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_products".
 *
 * @property integer $id_product
 * @property string $name
 * @property string $description
 * @property string $picture
 * @property string $price
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 * @property integer $user
 *
 * @property TblProductCategories[] $tblProductCategories
 * @property User $user0
 */
class TblProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_products';
    }
    public $cats;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'picture', 'price', 'status', 'cats', 'created_at', 'updated_at', 'user'], 'required'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['status', 'user'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'picture'], 'string', 'max' => 255],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_product' => 'Id Product',
            'name' => 'Name',
            'description' => 'Description',
            'picture' => 'Picture',
            'price' => 'Price',
            'cats' => 'Categories',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user' => 'User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblProductCategories()
    {
        return $this->hasMany(TblProductCategories::className(), ['product' => 'id_product']);
    }


    public function getCats()
    {
        return $this->hasMany(TblCategories::className(), ['id_category' => 'category'])
            ->viaTable('tbl_product_categories', ['product' => 'id_product']);
    }

    public function getCatsList()
    {
        return $this->getCats()->asArray();
    }

    public function afterSave($insert, $changedAttributes){
    \Yii::$app->db->createCommand()->delete('tbl_product_categories', 'product = '.(int) $this->id_product)->execute();

      foreach ($this->cats as $id) {
          $cta = new TblProductCategories();
          $cta->product = $this->id_product;
          $cta->category = $id;
          $cta->save();
      }
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'user']);
    }
}
