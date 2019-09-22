<!--============================= Gallery =============================-->
<title><?= $judul; ?></title>
<div class="gallery-wrap">
  <div class="container">
    <!-- Style 2 -->
    <div class="row">
      <div class="col-md-12">
        <h3 class="gallery-style">UMKM</h3>
      </div>
    </div><br>
    <div class="row">
      <div class="col-md-12">
        <div id="gallery">
          <div id="gallery-content">
            <div id="gallery-content-center">
              <?php foreach ($all_umkm->result() as $row) : ?>
                <a href="<?php echo base_url() . 'assets/images/' . $row->umkm_gambar; ?>" class="image-link2">
                  <img src="<?php echo base_url() . 'assets/images/' . $row->umkm_gambar; ?>" class="all img-fluid" alt="#" />
                </a>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--//End Style 2 -->

  </div>
</div>
<!--//End Gallery -->