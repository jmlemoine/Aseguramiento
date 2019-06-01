<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "auth".
 *
 * @property int $id
 * @property int $user_id
 * @property string $refresh_token
 * @property int $long_term
 * @property string $client_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $user
 */
class Auth extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auth';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'refresh_token', 'client_id', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'long_term', 'created_at', 'updated_at'], 'integer'],
            [['refresh_token'], 'string', 'max' => 32],
            [['client_id'], 'string', 'max' => 255],
            [['refresh_token'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'refresh_token' => 'Refresh Token',
            'long_term' => 'Long Term',
            'client_id' => 'Client ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
