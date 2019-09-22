<!--//END HEADER -->
<title><?= $judul; ?></title>
<section class="our-teachers">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="contact-title">
          <h2>Data Aparatur Kelurahan</h2>
        </div>


        <div class="box-body">
          <table id="display" class="table table-striped" style="font-size:13px;">
            <thead>
              <tr>
                <th>No</th>
                <th>Photo</th>
                <th>NIP</th>
                <th>Nama</th>

                <th>Jenis Kelamin</th>
                <th>Jabatan</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              foreach ($data->result_array() as $i) :
                $no++;
                $id = $i['siswa_id'];
                $nis = $i['siswa_nis'];
                $nama = $i['siswa_nama'];
                $jenkel = $i['siswa_jenkel'];
                $kelas_id = $i['siswa_kelas_id'];
                $kelas_nama = $i['kelas_nama'];
                $photo = $i['siswa_photo'];

                ?>
                <tr>
                  <td syle="alignment:center"><?php echo $no; ?></td>
                  <?php if (empty($photo)) : ?>
                    <td><img width="40" height="40" class="img-circle" src="<?php echo base_url() . 'assets/images/user_blank.png'; ?>"></td>
                  <?php else : ?>
                    <td><img width="40" height="40" class="img-circle" src="<?php echo base_url() . 'assets/images/' . $photo; ?>"></td>
                  <?php endif; ?>
                  <td><?php echo $nis; ?></td>
                  <td><?php echo $nama; ?></td>

                  <?php if ($jenkel == 'L') : ?>
                    <td>Laki-Laki</td>
                  <?php else : ?>
                    <td>Perempuan</td>
                  <?php endif; ?>
                  <td><?php echo $kelas_nama; ?></td>

                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- End row -->
    </div>
</section>






<!--//End Style 2 -->