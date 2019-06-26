<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "infrastructure".
 *
 * @property int $id_master
 * @property string $longtitude
 * @property string $latitude
 * @property string $status_infrastruktur
 * @property string $jenis_infrastruktur
 *
 * @property Aspiration $master
 */
class Infrastructure extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'infrastructure';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_master', 'longtitude', 'latitude', 'status_infrastruktur', 'jenis_infrastruktur'], 'required'],
            [['id_master'], 'integer'],
            [['longtitude', 'latitude'], 'number'],
            [['status_infrastruktur', 'jenis_infrastruktur'], 'string', 'max' => 50],
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
            'longtitude' => 'Longtitude',
            'latitude' => 'Latitude',
            'status_infrastruktur' => 'Status Infrastruktur',
            'jenis_infrastruktur' => 'Jenis Infrastruktur',
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
