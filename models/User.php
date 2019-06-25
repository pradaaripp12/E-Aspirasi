<?php

namespace app\models;

use Yii;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id_anggota;
    public $password;
    public $nama;
    public $alamat;
    public $no_hp;
    public $jenis_kelamin;
    public $is_admin;

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $model = Member::find()->where(['id_anggota' => $id])->one();

        if (empty($model)) {
            return null;
        }

        return new static($model);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return User::findIdentity($username);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id_anggota;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return false;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }
}
