<!--============================= Potensi =============================-->
<title><?= $judul; ?></title>
<section class="welcome_about">
    <div class="container">
        <div class="row">
            <?php foreach ($potensi->result() as $ijn) : ?>

                <div class="col-md-6">
                    <!-- gambar -->
                    <img style="width:300px;height:350px; margin-top:70px; margin-left:80px" src="<?php echo base_url() . 'assets/images/' . $ijn->potensi_gambar; ?>" class="img-fluid" alt="#">
                </div>

                <div class="col-md-6">
                    <!-- judul -->
                    <h2><?php echo $ijn->potensi_judul; ?></h2>

                    <HR WIDTH=100% SIZE=15>

                    <!-- isi potensi -->
                    <p><?php echo $ijn->potensi_ket; ?></p>
                </div>


            </div>
        <?php endforeach; ?>
    </div>
</section>