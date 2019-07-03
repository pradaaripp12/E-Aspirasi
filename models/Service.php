<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property int $id_master
 * @property string $dinas
 * @property string $jenis_layanan
 * @property string $review_layanan
 *
 * @property Aspiration $master
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['id_master', 'dinas', 'jenis_layanan', 'review_layanan'], 'required'],
            [['id_master'], 'integer'],
            [['dinas', 'jenis_layanan', 'review_layanan'], 'string', 'max' => 50],
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
            'id_master' => 'Laporan Kejadian',
            'dinas' => 'Dinas yang Bertindak',
            'jenis_layanan' => 'Status Pelayanan',
            'review_layanan' => 'Review Pelayanan',
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
