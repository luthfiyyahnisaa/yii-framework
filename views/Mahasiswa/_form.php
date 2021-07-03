<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;
use app\models\Prodi;
use app\models\Fakultas;


/* @var $this yii\web\View */
/* @var $model app\models\mahasiswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nim')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= 
        $form->field($model, 'tgl_lahir')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Pilih Tanggal ...'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'dd MM yyyy'
            ]
        ]); 
    ?>

    <?= $form->field($model, 'jekel')->radioList(array('L'=>'Laki-laki','P'=>'Perempuan'))->label('Jenis Kelamin') ?>

    <?= 
        $form->field($model, 'id_fakultas')->dropDownList(Fakultas::getFakultas(), ['id'=>'fakultas','prompt'=>'Select Jurusan...'])
    ?>


    <?=  $form->field($model, 'id_prodi') ->widget(DepDrop::classname(), 
        [
            'data' => Prodi::getProdiList($model->id_fakultas, $model->nim), 
            'options' => ['id' => 'prodi','prompt' => 'Select Prodi.....'],
            'pluginOptions' => [
                'depends' => ['fakultas'],
                'placeholder' => 'Select Prodi.....',
                'url' => Url::to(['mahasiswa/subcat'])
            ]
        ])
    ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
