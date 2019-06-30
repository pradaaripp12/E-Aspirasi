<?php

use kartik\sidenav\SideNav;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\widgets\Breadcrumbs;
use kartik\widgets\Alert;

$item = Yii::$app->controller->id ;

$params = ucfirst($item);
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
                        'active' => $item == 'site'
                    ],
                    [
                        'url' => Url::toRoute('/member'),
                        'label' => 'Member',
                        'icon' => 'user',
                        'active' => $item == 'member'
                    ],
                    [
                        'url' => Url::toRoute('/region'),
                        'label' => 'Wilayah',
                        'icon' => 'globe',
                        'active' => $item == 'region'
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
                        'url' => 'index.php?r=site%2Findex',
                        'label' => 'Home ('. Yii::$app->user->identity->nama .')',
                        'icon' => 'home'
                    ],
                    [
                        'url' => 'index.php?r=site%2Findex',
                        'label' => 'Laporkan Kerusakan',
                        'icon' => 'tasks'
                    ],
                    [
                        'url' => 'index.php?r=site%2Findex',
                        'label' => 'Laporkan Kejahatan',
                        'icon' => 'tasks'
                    ],
                    
                    [
                        'url' => 'index.php?r=site%2Findex',
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