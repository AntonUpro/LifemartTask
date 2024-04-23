<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[IngredientType]].
 *
 * @see IngredientType
 */
class IngredientTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return IngredientType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return IngredientType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
