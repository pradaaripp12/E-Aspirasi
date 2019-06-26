<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aspiration".
 *
 * @property int $id_master
 * @property string $tanggal
 * @property string $id_anggota
 * @property int $id_wilayah
 * @property int $status
 * @property string $judul
 * @property string $deskripsi
 * @property string $tanggapan
 *
 * @property Member $anggota
 * @property Region $wilayah
 * @property Infrastructure $infrastructure
 * @property Proof[] $proofs
 * @property SecurityProblem $securityProblem
 * @property Service $service
 */
class Aspiration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aspiration';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal', 'id_anggota', 'id_wilayah', 'status', 'judul', 'deskripsi'], 'required'],
            [['tanggal'], 'safe'],
            [['id_wilayah', 'status'], 'integer'],
            [['id_anggota'], 'string', 'max' => 25],
            [['judul', 'deskripsi', 'tanggapan'], 'string', 'max' => 191],
            [['id_anggota'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['id_anggota' => 'id_anggota']],
            [['id_wilayah'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['id_wilayah' => 'id_wilayah']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_master' => 'Id Master',
            'tanggal' => 'Tanggal',
            'id_anggota' => 'Id Anggota',
            'id_wilayah' => 'Id Wilayah',
            'status' => 'Status',
            'judul' => 'Judul',
            'deskripsi' => 'Deskripsi',
            'tanggapan' => 'Tanggapan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnggota()
    {
        return $this->hasOne(Member::className(), ['id_anggota' => 'id_anggota']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWilayah()
    {
        return $this->hasOne(Region::className(), ['id_wilayah' => 'id_wilayah']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfrastructure()
    {
        return $this->hasOne(Infrastructure::className(), ['id_master' => 'id_master']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProofs()
    {
        return $this->hasMany(Proof::className(), ['id_master' => 'id_master']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecurityProblem()
    {
        return $this->hasOne(SecurityProblem::className(), ['id_master' => 'id_master']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id_master' => 'id_master']);
    }
}
