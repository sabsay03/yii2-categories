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
<div class="col-xs-4">
<div class="categories-view">

    <h3><?= Html::encode($model->name) ?></h3>

    <p>
        <a >
            <img border="0" src="<?php echo $model->picture; ?>" width="300" height="200">
        </a>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'name',
            'count',
        ],
    ]) ?>


    <?php if(Yii::$app->user->id!=0) : ?>
        <?php if($model->count ==0) : ?>
            <p>

                <?= Html::button('Tükendi', ['class' => 'btn btn-danger']) ?>
                <?= Html::a('Yorumları Görüntüle', ['/reviews/reviews/index', 'id' => $model->id])?>
            </p>
        <?php else : ?>
            <p>
                <?= Html::a('Sepete Ekle', ['/products/products/addcart', 'id' => $model->id], [
                    'class' => 'btn btn-primary',
                    'data' => [
                        'confirm' => 'Ürünü almak istediğinizden emin misiniz?',
                        'method' => 'post',
                    ],
                ]) ?>
                <?= Html::a('Yorumları Görüntüle', ['/reviews/reviews/index', 'id' => $model->id])?>
            </p>



        <?php endif; ?>

    <?php else : ?>
        Sepete eklemek için giriş yapmalısınız.
        <?= Html::a('Yorumları Görüntüle', ['/reviews/reviews/index', 'id' => $model->id])?>
    <?php endif; ?>

</div>
</div>
