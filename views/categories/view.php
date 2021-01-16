<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $model sabsay03\categories\models\Categories */


\yii\web\YiiAsset::register($this);
$model->id;
?>
<div class="categories-view">

    <h3><?= Html::encode($model->name) ?></h3>

    <p>
        <?= Html::a('Bu Kategorideki Ürünleri Listele', ['fakeindex', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>
