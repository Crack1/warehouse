<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $nombre
 * @property string $apellido
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $imagen
 * @property integer $status
 * @property integer $role
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property TblAmbitoAgresion[] $tblAmbitoAgresions
 * @property TblCasos[] $tblCasos
 * @property TblInstReferencia[] $tblInstReferencias
 * @property TblOpcionAgresion[] $tblOpcionAgresions
 * @property TblOsig[] $tblOsigs
 * @property TblParentescoVictima[] $tblParentescoVictimas
 * @property TblRelacionVictima[] $tblRelacionVictimas
 * @property TblTipoAgresion[] $tblTipoAgresions
 * @property TblTipoLlamada[] $tblTipoLlamadas
 * @property TblVictima[] $tblVictimas
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'nombre', 'apellido', 'auth_key', 'password_hash', 'email', 'imagen', 'status', 'role', 'created_at', 'updated_at'], 'required'],
            [['status', 'role', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['nombre', 'apellido'], 'string', 'max' => 100],
            [['auth_key'], 'string', 'max' => 32],
            [['imagen'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'nombre' => 'Name',
            'apellido' => 'Last name',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'imagen' => 'Picture',
            'status' => 'Status',
            'role' => 'Role',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblAmbitoAgresions()
    {
        return $this->hasMany(TblAmbitoAgresion::className(), ['us_ingreso' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblCasos()
    {
        return $this->hasMany(TblCasos::className(), ['us_ingreso' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblInstReferencias()
    {
        return $this->hasMany(TblInstReferencia::className(), ['us_ingreso' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblOpcionAgresions()
    {
        return $this->hasMany(TblOpcionAgresion::className(), ['us_ingreso' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblOsigs()
    {
        return $this->hasMany(TblOsig::className(), ['us_ingreso' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblParentescoVictimas()
    {
        return $this->hasMany(TblParentescoVictima::className(), ['us_ingreso' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblRelacionVictimas()
    {
        return $this->hasMany(TblRelacionVictima::className(), ['us_ingreso' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblTipoAgresions()
    {
        return $this->hasMany(TblTipoAgresion::className(), ['us_ingreso' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblTipoLlamadas()
    {
        return $this->hasMany(TblTipoLlamada::className(), ['us_ingreso' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblVictimas()
    {
        return $this->hasMany(TblVictima::className(), ['us_ingreso' => 'id']);
    }
}
