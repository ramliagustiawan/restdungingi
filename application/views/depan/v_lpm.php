<!--============================= Nomor Penting =============================-->
<title><?= $judul; ?></title>
<section class="welcome_about">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="">
          <h2>Data Organisasi Kemasyarakatan</h2>
        </div>


        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">

              <div class="box-body">
                <table id="example1" class="table table-striped">
                  <thead>

                    <tr>
                      <th>No</th>
                      <th>Nama Ormas</th>
                      <th>Kepengurusan</th>
                      <th>Alamat</th>
                      <th>Nomor Kontak</th>
                      <th>Keterangan</th>

                    </tr>

                  </thead>

                  <tbody>
                    <?php
                    $no = 0;
                    foreach ($lpm->result() as $lp) :


                      $no++;
                      $nama = ['lpm_nama'];
                      $ketua = ['lpm_ketua'];
                      $alamat = ['lpm_alamat'];
                      $telepon = ['lpm_telepon'];
                      $ket = ['lpm_ket'];
                      ?>

                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $lp->lpm_nama; ?></td>
                        <td><?php echo $lp->lpm_ketua; ?></td>
                        <td><?php echo $lp->lpm_alamat; ?></td>
                        <td><?php echo $lp->lpm_telepon; ?></td>
                        <td><?php echo $lp->lpm_ket; ?></td>
                      </tr>

                    <?php endforeach; ?>
                  </tbody>
                </table>


              </div>
</section>