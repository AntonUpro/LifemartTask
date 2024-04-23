<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ingredient_type".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $code
 *
 * @property Ingredient[] $ingredients
 */
class IngredientType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingredient_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'code' => 'Code',
        ];
    }

    /**
     * Gets query for [[Ingredients]].
     *
     * @return \yii\db\ActiveQuery|IngredientQuery
     */
    public function getIngredients()
    {
        return $this->hasMany(Ingredient::class, ['type_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return IngredientTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IngredientTypeQuery(get_called_class());
    }
}
