<!--//END HEADER -->
<title><?= $judul; ?></title>
<section class="our-teachers">
  <div class="container">
    <div class="row">
      <div class="col-md-12">

        <div class="contact-title">
          <h2>Data Aparatur Kecamatan</h2>
        </div>


        <div class="box-body">
          <table id="display" class="table table-striped" style="font-size:13px;">
            <thead>
              <tr>
                <th>No</th>
                <th>Photo</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Tempat/Tgl Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>

              </tr>
            </thead>
            <tbody>
              <?php
              $no = 0;
              foreach ($data->result_array() as $i) :
                $no++;
                $id = $i['guru_id'];
                $nip = $i['guru_nip'];
                $nama = $i['guru_nama'];
                $jenkel = $i['guru_jenkel'];
                $tmp_lahir = $i['guru_tmp_lahir'];
                $tgl_lahir = $i['guru_tgl_lahir'];
                $mapel = $i['guru_mapel'];
                $photo = $i['guru_photo'];

                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <?php if (empty($photo)) : ?>
                    <td><img width="40" height="40" class="img-circle" src="<?php echo base_url() . 'assets/images/user_blank.png'; ?>"></td>
                  <?php else : ?>
                    <td><img width="40" height="40" class="img-circle" src="<?php echo base_url() . 'assets/images/' . $photo; ?>"></td>
                  <?php endif; ?>
                  <td><?php echo $nip; ?></td>
                  <td><?php echo $nama; ?></td>
                  <td><?php echo $tmp_lahir . ', ' . $tgl_lahir; ?></td>
                  <?php if ($jenkel == 'L') : ?>
                    <td>Laki-Laki</td>
                  <?php else : ?>
                    <td>Perempuan</td>
                  <?php endif; ?>
                  <td><?php echo $mapel; ?></td>

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