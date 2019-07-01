<?php

use kartik\sidenav\SideNav;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\widgets\Breadcrumbs;
use kartik\widgets\Alert;
use app\models\Aspiration;

$curentpage = Yii::$app->controller->id ;

$params = ucfirst($curentpage);
// VarDumper::dump($params);
// $this->params['breadcrumbs'][] = $params;
echo Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]);
$this->params['breadcrumbs'][] = ['label' => $params, 'url' => ['index']];
?>

<div class="col-lg-3">
        <?php
        $is_admin = Yii::$app->user->identity->is_admin;

        if ($is_admin) {
            echo SideNav::widget([
                'type' => SideNav::TYPE_DEFAULT,
                'heading' => 'Dashboard',
                'items' => [
                    [
                        'url' => Url::toRoute('site/index'),
                        'label' => 'Home ('. Yii::$app->user->identity->nama .')',
                        'icon' => 'home',
                        'active' => $curentpage == 'site'
                    ],
                    [
                        'url' => Url::toRoute('/member'),
                        'label' => 'Member',
                        'icon' => 'user',
                        'active' => $curentpage == 'member'
                    ],
                    [
                        'url' => Url::toRoute('/region'),
                        'label' => 'Wilayah',
                        'icon' => 'globe',
                        'active' => $curentpage == 'region'
                    ],

                    [
                        'url' => Url::toRoute('site/index'),
                        'label' => 'Laporan',
                        'icon' => 'tasks'
                    ],
                    [
                        'label' => 'Help',
                        'icon' => 'question-sign',
                        'items' => [
                            ['label' => 'About', 'icon'=>'info-sign', 'url'=>'#'],
                            ['label' => 'Contact', 'icon'=>'phone', 'url'=>'#'],
                        ],
                    ],
                ],
            ]);
        } else {
            echo SideNav::widget([
                'type' => SideNav::TYPE_DEFAULT,
                'heading' => 'Options',
                'items' => [
                    [
                        'url' => Url::toRoute('site/index'),
                        'label' => 'Home ('. Yii::$app->user->identity->nama .')',
                        'icon' => 'home',
                        'active' => $curentpage == 'site'
                    ],
                    [
                        'url' => Url::toRoute('/aspiration/create'),
                        'label' => 'Tambahkan Aspirasi',
                        'icon' => 'tasks'
                    ],
                    [
                        'url' => Url::toRoute('/create'),
                        'label' => 'Laporan Kerusakan',
                        'icon' => 'tasks'
                    ],
                    [
                        'url' => Url::toRoute('/security-problem/create'),
                        'label' => 'Laporan Kejahatan',
                        'icon' => 'tasks'
                    ],
                    
                    [
                        'url' => Url::toRoute('/service/create'),
                        'label' => 'Beri Nilai Pelayanan',
                        'icon' => 'star'
                    ],
                    [
                        'label' => 'Help',
                        'icon' => 'question-sign',
                        'items' => [
                            ['label' => 'About', 'icon'=>'info-sign', 'url'=>'#'],
                            ['label' => 'Contact', 'icon'=>'phone', 'url'=>'#'],
                        ],
                    ],
                ],
            ]);
        }
        
        ?>
        </div>