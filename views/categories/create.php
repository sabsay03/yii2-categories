<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model sabsay03\categories\models\Categories */

$this->title = 'Create categories';
$this->params['breadcrumbs'][] = ['label' => 'categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (Yii::$app->user->id==1):?>
<div class="categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php else:?>
    Sadece ID si 1  olan kullanıcı (Yani Admin) kategori ekleyebilir.
<?php endif;?>