<title><?= $judul; ?></title>
<!--============================= perum =============================-->

<section class="welcome_about">
    <div class="container">
        <div class="row">
            <?php foreach ($perum->result() as $prm) : ?>
                <div class="col-md-12">
                    <!-- judul -->
                    <h2><?php echo $prm->perum_nama; ?></h2>
                    <!-- isi perum -->
                    <p><?php echo $prm->perum_kelurahan; ?></p>
                </div>

                <HR WIDTH=85% SIZE=5>
            <?php endforeach; ?>
        </div>

    </div>
</section>