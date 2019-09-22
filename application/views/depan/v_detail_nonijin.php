<!--============================= nonijin =============================-->
<title><?= $judul; ?></title>

<section class="welcome_about">
    <div class="container">
        <div class="row">
            <?php foreach ($nonijin->result() as $ijn) : ?>
                <div class="col-md-12">
                    <!-- judul -->
                    <h2><?php echo $ijn->nonijin_judul; ?></h2>
                    <!-- isi nonijin -->
                    <p><?php echo $ijn->nonijin_isi; ?></p>
                </div>

                <HR WIDTH=85% SIZE=5>

            <?php endforeach; ?>
        </div>

    </div>
</section>