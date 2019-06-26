<?php

/* @var $this yii\web\View */
$this->title = 'E-Aspirasi';
?>
<div class="site-index">
    
    <div class="body-content">

        <div class="row">
            <?php echo \Yii::$app->view->renderFile('@app/views/layouts/sidebar.php'); ?>
            <div class="col-lg-8">
                <?php

                $is_admin = Yii::$app->user->identity->is_admin;
                if($is_admin){
                    echo '<h2>Selamat Datang!</h2>
                    <p>Segera cek data update aspirasi masyarakat dan berikan evaluasi.
                    </p>
                    <p><a class="btn btn-default" href="">Cek Aspirasi &raquo;</a></p>';

                }else{
                    echo '<h2>Selamat Datang!</h2>

                    <p>Warga negara yang hidup di Republik Indonesia memiliki kapasitas untuk menyuarakan pendapatnya secara lugas terhadap sistem dan 
                    keberlangsungan negara. Sebagai penduduk wilayah Surakarta, kami memberikan fasilitas penyampaian pendapat untuk masyarakat di wilayah
                    Surakarta. Dengan adanya situs ini, kami memfasilitasi warga untuk mendukung tercapainya negara yang lebih baik melalui evaluasi tiap 
                    insfrastruktur, layanan, dan masalah keamanan.
                    </p>

                    <p><a class="btn btn-default" href="">Sampaikan Aspirasi &raquo;</a></p>';
                }
                ?>
            </div>
            
        </div>

    </div>
</div>
