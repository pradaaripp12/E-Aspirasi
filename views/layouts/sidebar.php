<?php

use kartik\sidenav\SideNav;

?>
<div class="col-lg-3">
        <?php
        $is_admin = Yii::$app->user->identity->is_admin;

        if ($is_admin) {
            echo SideNav::widget([
                'type' => SideNav::TYPE_DEFAULT,
                'heading' => 'Options',
                'items' => [
                    [
                        'url' => 'index.php?r=site%2Findex',
                        'label' => 'Home ('. Yii::$app->user->identity->nama .')',
                        'icon' => 'home',
                        'active' => true
                    ],
                    [
                        'url' => 'index.php?r=member',
                        'label' => 'Member',
                        'icon' => 'user'
                    ],
                    [
                        'url' => 'index.php?r=region',
                        'label' => 'Wilayah',
                        'icon' => 'globe'
                    ],

                    [
                        'url' => 'index.php?r=site%2Findex',
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
                        'label' => 'Aspirasi',
                        'icon' => 'comment'
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