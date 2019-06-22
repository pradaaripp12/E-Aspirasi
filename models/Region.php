<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "region".
 *
 * @property int $id_wilayah
 * @property string $nama_wilayah
 *
 * @property Aspiration[] $aspirations
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_wilayah'], 'required'],
            [['nama_wilayah'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_wilayah' => 'Id Wilayah',
            'nama_wilayah' => 'Nama Wilayah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAspirations()
    {
        return $this->hasMany(Aspiration::className(), ['id_wilayah' => 'id_wilayah']);
    }
}
