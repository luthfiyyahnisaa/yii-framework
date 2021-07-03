<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\prodi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prodi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $dataPost=ArrayHelper::map(\app\models\Fakultas::find()->asArray()->all(), 'id', 'nama_fakultas');
        echo $form->field($model, 'id_fakultas')
        ->dropDownList(
            $dataPost,           
            ['id'=>'nama_fakultas']
        );

    ?>

    <?= $form->field($model, 'prodi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
