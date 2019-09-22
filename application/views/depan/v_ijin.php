<!--============================= ijin =============================-->

<title><?= $judul; ?></title>
<section class="welcome_about">
    <div class="container">
        <div class="row">
            <?php foreach ($ijin->result() as $ijn) : ?>

                <div class="col-md-5">
                    <!-- gambar -->
                    <img style="width:300px;height:350px; margin-top:70px; margin-left:80px" src="<?php echo base_url() . 'assets/images/' . $ijn->ijin_gambar; ?>" class="img-fluid" alt="#">
                </div>

                <div class="col-md-7">
                    <!-- judul -->
                    <h2><?php echo $ijn->ijin_judul; ?></h2>
                    <!-- isi ijin -->
                    <p><?php echo $ijn->ijin_isi; ?></p>
                </div>


            </div>
        <?php endforeach; ?>
    </div>
</section>