<!--============================= visi misi =============================-->
<title><?= $judul; ?></title>

<section class="welcome_about">
    <div class="container">
        <div class="row">
            <?php foreach ($visi->result() as $vs) : ?>
                <div class="col-md-7">
                    <!-- judul -->
                    <h2><?php echo $vs->visi_judul; ?></h2>
                    <!-- isi visi -->
                    <p><?php echo $vs->visi_isi; ?></p>
                </div>
                <div class="col-md-5">
                    <!-- gambar -->
                    <img style="width:300px;height:350px; margin-top:70px; margin-left:80px" src="<?php echo base_url() . 'assets/images/' . $vs->visi_gambar; ?>" class="img-fluid" alt="#">
                </div>

            </div>
        <?php endforeach; ?>
    </div>
</section>