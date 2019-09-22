<!--============================= Kelurahan =============================-->
<title><?= $judul; ?></title>

<section class="welcome_about">
  <div class="container">
    <div class="row">
      <?php foreach ($libuo->result() as $lib) : ?>

        <div class="col-md-5">
          <!-- judul -->
          <h2><?php echo $lib->libuo_judul; ?></h2>
          <!-- isi libuo -->
          <p><?php echo $lib->libuo_isi; ?></p>
        </div>

        <div class="col-md-7">
          <!-- gambar -->
          <img style="width:450px;height:350px; margin-top:70px; margin-left:80px" src="<?php echo base_url() . 'assets/images/' . $lib->libuo_gambar; ?>" class="img-fluid" alt="#">
        </div>

        &nbsp;
        &nbsp;
        <HR WIDTH=85% SIZE=5>

        <div class="col-md-12">
          <div class="table-responsive">
            <div class="box-body">
              <table id="example1" class="table table-striped">
                <thead>
                  <tr>
                    <th>Lurah</th>
                    <th>Kontak</th>
                    <th>Alamat</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $no = 0;

                  $no++;
                  $lurah = ['libuo_lurah'];
                  $hp = ['libuo_hp'];
                  $alamat = ['libuo_alamat'];
                  $ket = ['libuo_ket'];
                  ?>

                  <tr>

                    <td><?php echo $lib->libuo_lurah; ?></td>
                    <td><?php echo $lib->libuo_hp; ?></td>
                    <td><?php echo $lib->libuo_alamat; ?></td>
                    <td><?php echo $lib->libuo_ket; ?></td>

                  </tr>
                </tbody>
              </table>

              <HR WIDTH=85% SIZE=5>
            <?php endforeach; ?>
            <div class="row">
            </div>
</section>