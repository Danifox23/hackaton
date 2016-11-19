<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Spot".
 *
 * @property integer $id
 * @property string $address
 */
class Spot extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Spot';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address'], 'required'],
            [['address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
        ];
    }

    /**
     * @inheritdoc
     * @return SpotQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SpotQuery(get_called_class());
    }
}
