<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property string $id_anggota
 * @property string $password
 * @property string $nama
 * @property string $alamat
 * @property string $no_hp
 * @property string $jenis_kelamin
 * @property int $is_admin
 *
 * @property Aspiration[] $aspirations
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_anggota', 'password', 'nama', 'alamat', 'no_hp', 'is_admin'], 'required'],
            [['jenis_kelamin'], 'string'],
            [['is_admin'], 'integer'],
            [['id_anggota'], 'string', 'max' => 25],
            [['password', 'nama', 'alamat'], 'string', 'max' => 191],
            [['no_hp'], 'string', 'max' => 13],
            [['id_anggota'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_anggota' => 'Id Anggota',
            'password' => 'Password',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'no_hp' => 'No Hp',
            'jenis_kelamin' => 'Jenis Kelamin',
            'is_admin' => 'Is Admin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAspirations()
    {
        return $this->hasMany(Aspiration::className(), ['id_anggota' => 'id_anggota']);
    }

    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    // public static function getIdAnggota()
    // {
    //     $model = Member::find()->all();
    //     foreach ($model as $values) {
    //         $data[$values->id_anggota] = $values->id_anggota;
    //     }
    //     return $data;
    // }
}
