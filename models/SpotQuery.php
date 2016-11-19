<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Spot]].
 *
 * @see Spot
 */
class SpotQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Spot[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Spot|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
