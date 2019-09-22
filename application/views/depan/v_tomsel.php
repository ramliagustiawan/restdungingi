<!--============================= Kelurahan =============================-->
<title><?= $judul; ?></title>
<section class="welcome_about">
  <div class="container">
    <div class="row">
      <?php foreach ($tomsel->result() as $ts) : ?>

        <div class="col-md-5">
          <!-- judul -->
          <h2><?php echo $ts->tomsel_judul; ?></h2>
          <!-- isi tomsel -->
          <p><?php echo $ts->tomsel_isi; ?></p>
        </div>

        <div class="col-md-7">
          <!-- gambar -->
          <img style="width:450px;height:350px; margin-top:70px; margin-left:80px" src="<?php echo base_url() . 'assets/images/' . $ts->tomsel_gambar; ?>" class="img-fluid" alt="#">
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
                  $lurah = ['tomsel_lurah'];
                  $hp = ['tomsel_hp'];
                  $alamat = ['tomsel_alamat'];
                  $ket = ['tomsel_ket'];
                  ?>

                  <tr>

                    <td><?php echo $ts->tomsel_lurah; ?></td>
                    <td><?php echo $ts->tomsel_hp; ?></td>
                    <td><?php echo $ts->tomsel_alamat; ?></td>
                    <td><?php echo $ts->tomsel_ket; ?></td>

                  </tr>
                </tbody>
              </table>

              <HR WIDTH=85% SIZE=5>
            <?php endforeach; ?>
            <div class="row">
            </div>
</section>