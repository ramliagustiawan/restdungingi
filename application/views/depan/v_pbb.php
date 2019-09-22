<!--============================= PBB =============================-->

<title><?= $judul; ?></title>
<section class="clearfix about about-style2">
  <div class="container">
    <div class="row">

      <div class="contact-title">
        <h2>1. Data Pajak Bumi Dan Bangunan</h2>
      </div>


      <div class="row ">
        <div class="col-md-12">
          <div class="table-responsive">

            <div class="box-body">
              <table id="example1" class="table table-striped">
                <thead>

                  <tr>
                    <th>No</th>
                    <th>Kode Kelurahan</th>
                    <th>Kelurahan</th>
                    <th>Rencana Penerimaan</th>
                    <th>Realisasi Pokok</th>
                    <th>Realisasi Denda</th>
                    <th>Total Realisasi</th>
                    <th>Persentasi</th>
                    <th>Tanggal</th>
                    <th>Ranking</th>

                  </tr>

                </thead>

                <tbody>
                  <?php
                  $no = 0;
                  foreach ($pbb->result_array() as $pb) :

                    $no++;
                    $pbbkode = $pb['pbb_kode'];
                    $kelurahan = $pb['pbb_kelurahan'];
                    $target = $pb['pbb_target'];
                    $realisasi = $pb['pbb_realisasi'];
                    $denda = $pb['pbb_denda'];
                    $total = $pb['pbb_total'];
                    $persen = $pb['pbb_persen'];
                    $tanggal = $pb['tanggal'];
                    $rank = $pb['pbb_rank'];
                    $jumlah = $target + $realisasi + $denda + $total;;

                    ?>

                    <tr>

                      <td><?php echo $no; ?></td>
                      <td><?php echo $pbbkode; ?></td>
                      <td><?php echo $kelurahan; ?></td>
                      <td>Rp. <?php echo number_format($target, 0, ',', '.') ?>,-</td>
                      <td>Rp. <?php echo number_format($realisasi, 0, ',', '.') ?>,-</td>
                      <td>Rp. <?php echo number_format($denda, 0, ',', '.') ?>,-</td>
                      <td>Rp. <?php echo number_format($total, 0, ',', '.') ?>,-</td>
                      <td><?php echo $persen; ?> %</td>
                      <td><?php echo $tanggal; ?></td>
                      <td><?php echo $rank; ?></td>

                    </tr>


                  <?php endforeach; ?>
                </tbody>
              </table>

            </div>
</section>

<section class="our_courses">
  <div class="container">
    <div class="row">

      <div class="contact-title">
        <h2>2. Data Penunggak Pajak Bumi Dan Bangunan</h2>
      </div>
    </div>


    <div class="row ">
      <div class="col-md-12">
        <div class="table-responsive">

          <div class="box-body">
            <table id="display" class="table table-striped">
              <thead>

                <tr>
                  <th>No</th>
                  <th>Nama Wajib Pajak</th>
                  <th>kelurahan</th>
                  <th>Jumlah</th>
                  <th>Tahun</th>
                  <th>Keterangan</th>

                </tr>

              </thead>

              <tbody>
                <?php
                $no = 0;
                foreach ($data->result_array() as $i) :
                  $no++;
                  $tunggakan_id = $i['tunggakan_id'];
                  $tunggakan_judul = $i['tunggakan_judul'];
                  $tunggakan_jumlah = $i['tunggakan_jumlah'];
                  $tunggakan_tahun = $i['tunggakan_tahun'];
                  $tunggakan_ket = $i['tunggakan_ket'];

                  $tunggakan_kelurahan_id = $i['tunggakan_kelurahan_id'];
                  $tunggakan_kelurahan_nama = $i['kelurahan_nama'];
                  //  $jumlah += $total
                  ?>

                  <tr>

                    <td><?php echo $no; ?></td>
                    <td><?php echo $tunggakan_judul; ?></td>
                    <td><?php echo $tunggakan_kelurahan_nama; ?></td>
                    <td>Rp. <?php echo number_format($tunggakan_jumlah, 0, ',', '.') ?>,-</td>
                    <td><?php echo $tunggakan_tahun; ?></td>
                    <td><?php echo $tunggakan_ket; ?></td>

                  </tr>


                <?php endforeach; ?>
              </tbody>
            </table>

          </div>
</section>