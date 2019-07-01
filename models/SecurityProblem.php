<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "security_problem".
 *
 * @property int $id_master
 * @property string $jenis_kejahatan
 * @property string $longtitude
 * @property string $latitude
 *
 * @property Aspiration $master
 */
class SecurityProblem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'security_problem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['id_master', 'jenis_kejahatan', 'longtitude', 'latitude'], 'required'],
            [['id_master'], 'integer'],
            [['longtitude', 'latitude'], 'number'],
            [['jenis_kejahatan'], 'string', 'max' => 191],
            [['id_master'], 'unique'],
            [['id_master'], 'exist', 'skipOnError' => true, 'targetClass' => Aspiration::className(), 'targetAttribute' => ['id_master' => 'id_master']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_master' => 'Id Master',
            'jenis_kejahatan' => 'Jenis Kejahatan',
            'longtitude' => 'Longtitude',
            'latitude' => 'Latitude',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaster()
    {
        return $this->hasOne(Aspiration::className(), ['id_master' => 'id_master']);
    }
}
