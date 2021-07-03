<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fakultas".
 *
 * @property int $id
 * @property string $nama_fakultas
 *
 * @property Pelajar[] $pelajars
 * @property Prodi[] $prodis
 */
class Fakultas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fakultas';
    }

    public static function getFakultas()
    {
        return Self::find()->select(['nama_fakultas', 'id'])->indexBy('id')->column();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_fakultas'], 'required'],
            [['nama_fakultas'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_fakultas' => 'Nama Fakultas',
        ];
    }

    /**
     * Gets query for [[Pelajars]].
     *
     * @return \yii\db\ActiveQuery
     */

    public function getMahasiswa()
    {
        
        return $this->hasOne(Mahasiswa::className(),['id_fakultas'=>'id']);
    }
    /**
     * Gets query for [[Prodis]].
     *
     * @return \yii\db\ActiveQuery
     */
}