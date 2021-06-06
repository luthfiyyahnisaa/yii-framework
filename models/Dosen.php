<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dosen".
 *
 * @property int $id_dosen
 * @property string $nama_dosen
 * @property string $jenis_kelamin
 * @property string $tgl_lahir
 * @property string $jabatan
 * @property string $alamat
 *
 * @property Jurusan $dosen
 */
class Dosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dosen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_dosen', 'jenis_kelamin', 'tgl_lahir', 'jabatan', 'alamat'], 'required'],
            [['tgl_lahir'], 'safe'],
            [['nama_dosen', 'jabatan'], 'string', 'max' => 50],
            [['jenis_kelamin'], 'string', 'max' => 20],
            [['alamat'], 'string', 'max' => 100]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_dosen' => 'Id Dosen',
            'nama_dosen' => 'Nama Dosen',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tgl_lahir' => 'Tgl Lahir',
            'jabatan' => 'Jabatan',
            'alamat' => 'Alamat',
        ];
    }

    /**
     * Gets query for [[Dosen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDosen()
    {
        return $this->hasOne(Jurusan::className(), ['id_jurusan' => 'id_dosen']);
    }
}
