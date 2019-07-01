<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
$this->title='E-Aspirasi';
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

    <style>
        #map {
        height: 100px;
        width: 100%;
      }
    </style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            // ['label' => 'About', 'url' => ['/site/about']],
            // ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->id_anggota . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
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
    <div class="container">
        <p class="pull-left">&copy; E-Aspirasi <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
<script>
        $(document).ready(() => {
            $("#dynamicmodel-jenis_aspirasi").on('change', function() {
                var jenis = $(this).val();
                if (jenis!=""){
                    $('#jenis').show();
                }
                else{
                    $('#jenis').hide();
                }
                $('.hidden-form').hide();
                if (jenis) {
                    $('#' + jenis).show();
                }
            })
        })
    </script>

<script>
      var map;
      function initMap() {
          var center = {lat: -7.5591225, lng: 110.7837924};
        map = new google.maps.Map(document.getElementById('map'), {
          center: center,
          zoom: 13
        });

        var marker = new google.maps.Marker({
            position: center,
            map: map,
            title: 'Set Location'
        });

        google.maps.event.addListener(map, 'center_changed', function () {
            var center = map.getCenter();
                marker.setPosition(center)
                $("#infrastructure-longtitude").val(center.lng())
                $("#infrastructure-latitude").val(center.lat())
                $("#securityproblem-longtitude").val(center.lng())
                $("#securityproblem-latitude").val(center.lat())
        })
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkERXTRahQ20HpM8bx3IVjShrjt41I6QY&callback=initMap"
    async defer></script>
</html>
<?php $this->endPage() ?>
