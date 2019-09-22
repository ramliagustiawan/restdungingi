<!--============================= Peta =============================-->
<title><?= $judul; ?></title>
<section class="welcome_about">
    <div class="container">
        <div class="row">
            <?php foreach ($peta->result() as $pt) : ?>

                <div class="col-md-6">
                    <!-- gambar -->
                    <img style="width:300px;height:350px; margin-top:70px; margin-left:80px" src="<?php echo base_url() . 'assets/images/' . $pt->peta_gambar; ?>" class="img-fluid" alt="#">
                </div>

                <div class="col-md-6">
                    <!-- judul -->
                    <h2><?php echo $pt->peta_judul; ?></h2>
                    <!-- isi peta -->
                    <p><?php echo $pt->peta_isi; ?></p>
                </div>


            </div>
        <?php endforeach; ?>
    </div>
</section>