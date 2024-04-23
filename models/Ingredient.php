<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingredient".
 *
 * @property int $id
 * @property int $type_id
 * @property string $title
 * @property float $price
 *
 * @property IngredientType $type
 */
class Ingredient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingredient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'title', 'price'], 'required'],
            [['type_id'], 'integer'],
            [['price'], 'number'],
            [['title'], 'string', 'max' => 255],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => IngredientType::class, 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Type ID',
            'title' => 'Title',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery|IngredientTypeQuery
     */
    public function getType()
    {
        return $this->hasOne(IngredientType::class, ['id' => 'type_id']);
    }

    /**
     * {@inheritdoc}
     * @return IngredientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IngredientQuery(get_called_class());
    }
}
