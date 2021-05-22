<?php 
use yi:\helpers\Html;
?>
<p>Terimakasih sudah menginput pada form:</p>
<u1>
<li><label>Name</label>: <?= Html::encode($model->name) ?></li>
<li><label>Email</label>: <?= Html::encode($model->email) ?></li>
<li><label>No Telp</label>: <?= Html::encode($model->notelp) ?></li>
<li><label>Alamat</label>: <?= Html::encode($model->alamat) ?></li>
</u1>