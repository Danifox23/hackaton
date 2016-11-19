<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Part".
 *
 * @property integer $id
 * @property integer $status_id
 * @property integer $user_id
 * @property integer $vol_id
 * @property integer $date_edit
 * @property integer $date
 *
 * @property Status $status
 * @property User $user
 * @property User $vol
 * @property Position[] $positions
 */
class Part extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Part';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_id', 'user_id', 'vol_id', 'date_edit', 'date'], 'required'],
            [['status_id', 'user_id', 'vol_id', 'date_edit', 'date'], 'integer'],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['vol_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['vol_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_id' => 'Статус',
            'user_id' => 'User ID',
            'vol_id' => 'Vol ID',
            'date_edit' => 'Date Edit',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVol()
    {
        return $this->hasOne(User::className(), ['id' => 'vol_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPositions()
    {
        return $this->hasMany(Position::className(), ['part_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return PartQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PartQuery(get_called_class());
    }
}
