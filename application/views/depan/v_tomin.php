<!--============================= Kelurahan =============================-->
<title><?= $judul; ?></title>
<section class="welcome_about">
  <div class="container">
    <div class="row">
      <?php foreach ($tomin->result() as $tom) : ?>

        <div class="col-md-5">
          <!-- judul -->
          <h2><?php echo $tom->tomin_judul; ?></h2>
          <!-- isi tomin -->
          <p><?php echo $tom->tomin_isi; ?></p>
        </div>

        <div class="col-md-7">
          <!-- gambar -->
          <img style="width:450px;height:350px; margin-top:70px; margin-left:80px" src="<?php echo base_url() . 'assets/images/' . $tom->tomin_gambar; ?>" class="img-fluid" alt="#">
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
                  $lurah = ['tomin_lurah'];
                  $hp = ['tomin_hp'];
                  $alamat = ['tomin_alamat'];
                  $ket = ['tomin_ket'];
                  ?>

                  <tr>

                    <td><?php echo $tom->tomin_lurah; ?></td>
                    <td><?php echo $tom->tomin_hp; ?></td>
                    <td><?php echo $tom->tomin_alamat; ?></td>
                    <td><?php echo $tom->tomin_ket; ?></td>

                  </tr>
                </tbody>
              </table>

              <HR WIDTH=85% SIZE=5>
            <?php endforeach; ?>
            <div class="row">
            </div>
</section>