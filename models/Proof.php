<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proof".
 *
 * @property int $id_detail
 * @property string $file_path_foto
 * @property string $title_foto
 * @property string $keterangan_foto
 * @property string $id_master
 *
 * @property Aspiration $master
 */
class Proof extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proof';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_path_foto', 'title_foto', 'id_master'], 'required'],
            [['file_path_foto', 'title_foto', 'keterangan_foto'], 'string', 'max' => 191],
            [['id_master'], 'string', 'max' => 25],
            [['id_master'], 'exist', 'skipOnError' => true, 'targetClass' => Aspiration::className(), 'targetAttribute' => ['id_master' => 'id_master']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_detail' => 'Id Detail',
            'file_path_foto' => 'File Path Foto',
            'title_foto' => 'Title Foto',
            'keterangan_foto' => 'Keterangan Foto',
            'id_master' => 'Id Master',
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
