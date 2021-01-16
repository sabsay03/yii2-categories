# yii2-categories
categories-Module

# yii2-shopping
Yii2 shopping Module

## Yii2 KOU E-Ticaret Sitesi

Projeyi bir grup olarak 4 arkadaş yaptık.

Modüller:

180202052-Melih Çalışkan-> Products=> Ürünleri listeleme,Sepete Ekleme,Admin için Ürün Ekleme sekmesi

180202039-Onur Okyay-> Shopping=>Sepetteki ürünleri listeleme,Satın alma,Geçmiş satın alımları gösterme

180202105-Sabri Kusay Gülmez-> Category=> Kategori listeleme,Seçilen kategoriye göre ürünleri listeleme,Admin için Kategori Ekleme

180202026-Imran Kucur-> Reviews=>Her bir ürün için yorum ekleme ve puan verme,Seçilen ürüne yapılan tüm yorumları gösterme

User=> Kayıt-Giriş,Hesabım sekmesi

## Kurulum
Vagrantı kaldırdıktan sonra ssh ile bağlanın ve terminalde advanced içine girdikten sonra(cd /var/www/advanced) aşağıdakileri yazınız.

```
composer require melih058/yii2-migrations "dev-main"

composer require melih058/yii2-products "dev-main"

composer require sabsay03/yii2-categories "dev-main"

composer require imrankucur/yii2-reviews "dev-main"

composer require sabsay03/yii2-user "dev-main"

composer require onurokkyay/yii2-shopping "dev-main"
```



*Advanced içinde vendor klasöründe bu dosyaların oluşması gerekir*

**Advanced->backend->config->main.php içerisine modüller aşağıda belirtilen şekilde referans edilmelidir.**


```
'modules' => [
        'products' => [
            'class'=>'melih058\products\Module'
        ],
        'shopping' => [
    'class' => 'onurokkyay\shopping\Module',
    ],
        'user' => [
    'class' => 'sabsay03\user\Module',
],
        'categories' => [
            'class' => 'sabsay03\categories\Module',
        ],
        'reviews' => [
            'class' => 'imrankucur\reviews\Module',
        ],
    ]
```

## Migrations

Advancedin içindeyken (cd /var/www/advanced) terminale bu komutu yazınız.

**advanced/phpmyadmin e user kısmına root yazıp giriş yaptıktan sonra yii2advanced adında yeni bir database oluşturun.**

```
php yii migrate --migrationPath=@melih058/migrations/migrations
```
7 yeni migration gördükten sonra yes diyip onaylayın ve sonra tabloları phpmyadminde kontrol edin.

## Site Görünüşü

advanced->backend->views->layout->main.php'nin içine aşağıdakilerin hepsini kopyalayıp yapıştırın.

```
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<class="img-responsive"/>Admin',
        'brandUrl' => 'http://advanced/backend/web/index.php?r=user/user/index',
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Ana Sayfa', 'url' => ['/site/index']],
        ['label' => 'Ürünler', 'url' => ['/products/products/index']],
        ['label' => 'Kategoriler', 'url' => ['/categories/categories/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Giriş Yap', 'url' => ['/site/login']];
        $menuItems[] = ['label' => 'Kayıt Ol', 'url' => ['/site/signup']];

    } else {


       $menuItems[] = ['label' => 'Sepetim', 'url' => ['/shopping/shopping/index']];
            $menuItems[] = ['label' => 'Sipariş Geçmişim', 'url' => ['/shopping/purchasehistory/index']];
        $menuItems[] = ['label' => 'Hesabım', 'url' => ['/user/user/view']];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Çıkış Yap (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container ">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
```

advanced->backend->views->site->index.php'nin içine aşağıdakilerin hepsini kopyalayıp yapıştırın.

```
<?php

/* @var $this yii\web\View */

$this->title = 'KOU E-Ticaret';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Hoşgeldiniz</h1>



        <p><a class="btn btn-lg btn-success" href=/backend/web/index.php?r=products/products/index>Alışverişe Başla!</a></p>

        <p><a class="btn btn-lg btn-success" href=/backend/web/index.php?r=categories/categories/index>Kategoriler</a></p>
    </div>
</div>

```



## Kayıt Olma
Aşağıdaki linkten kayıt olunuz.

http://advanced/frontend/web/index.php?r=site%2Fsignup

Sonra phpmyadmine girip user tablosunda status'u 9 dan 10 a çevirin. 

Kayıt olma işlemi tamamlandıktan aşağıdaki linkten giriş yapınız.

http://advanced/backend/web/index.php?r=site%2Flogin

***İlk kayıt olan kullanıcının user tablosundaki id'si 1 olduğu için 1 sayılır.Yani idsi 1 olan kullanıcı admindir.Sitede sol üstte bulunan admin özelliklerini kullanabilir.Diğer kullanıcılar bu sekmeyi kullanamaz.***

## Yii2 Categories Modülü

categories modülü productla one to many ilişkisine sahip yani bir productın bir category si olurken bir categorynin birden fazla productı olabilir.Sadece admin category ekleyebilir üstteki menüden categoryleri listeleyebiliriz ve ordan o category e ait productları listeleyebiliriz.

###### Categories  Sayfası
![category](<resim3.png>)

###### Categori Products Sayfası
![category](<resim4.png>)
 
