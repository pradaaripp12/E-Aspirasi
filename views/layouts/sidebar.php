<?php

use kartik\sidenav\SideNav;

?>
<div class="col-lg-4">
        <?php
        $is_admin = Yii::$app->user->identity->is_admin;

        if ($is_admin) {
            echo SideNav::widget([
                'type' => SideNav::TYPE_DEFAULT,
                'heading' => 'Options',
                'items' => [
                    [
                        'url' => 'index.php?r=site%2Findex',
                        'label' => 'Home (Admin)',
                        'icon' => 'home'
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
                        'label' => 'Home (User)',
                        'icon' => 'home'
                    ],
                    [
                        'url' => 'index.php?r=site%2Findex',
                        'label' => 'Aspirasi',
                        'icon' => 'home'
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