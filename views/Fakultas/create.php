<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\fakultas */

$this->title = 'Create Fakultas';
$this->params['breadcrumbs'][] = ['label' => 'Fakultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fakultas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
