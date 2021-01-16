<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use sabsay03\categories\views\Categories\view;
/* @var $this yii\web\View */
/* @var $searchModel sabsay03\categories\models\CategoriesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $id sabsay03\categories\views\Categories\view */
/* @var $model sabsay03\categories\models\Categories */
function search($id)
{
    $query = \Melih627\products\models\Products::find();

    // add conditions that should always apply here

    $dataProvider = new ActiveDataProvider([
        'query' => $query,
    ]);
    // grid filtering conditions
    $query->andFilterWhere([
        'category_id' => $id,
    ]);

    return $dataProvider;
}
$dataProvider=search($model->id);
?>
<div class="categories-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <h1><?= Html::encode($model->name." Kategorisindeki Ürünler") ?></h1>
    <?=
    ListView::widget([


        'dataProvider' => $dataProvider,
        'options' => [
            'tag' => 'div',
            'class' => 'list-wrapper',
            'id' => 'list-wrapper',
        ],
        'layout' => "{pager}\n{items}\n{summary}",
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('fakeview',['model' => $model]);

            // or just do some echo
            // return $model->title . ' posted by ' . $model->author;
        },
        'itemOptions' => [
            'tag' => false,
        ],
        'pager' => [
            'firstPageLabel' => 'first',
            'lastPageLabel' => 'last',
            'nextPageLabel' => 'next',
            'prevPageLabel' => 'previous',
            'maxButtonCount' => 3,
        ],
    ]);
    ?>


</div>
