<!--============================= EKTP =============================-->

<title><?= $judul; ?></title>
<section class="welcome_about">
    <div class="container">
        <div class="row">

            <div class="contact-title">
                <h2>Data Layanan On Proses</h2>
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
                                    <th>Jenis Layanan</th>
                                    <th>Pemohon</th>
                                    <th>Kelurahan</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>

                                </tr>

                            </thead>

                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($data->result_array() as $i) :
                                    $no++;
                                    $layanan_id = $i['layanan_id'];
                                    $layanan_judul = $i['layanan_judul'];
                                    $layanan_pemohon = $i['layanan_pemohon'];
                                    $layanan_tanggal = $i['tanggal'];
                                    $layanan_ket = $i['layanan_ket'];

                                    $layanan_kelurahan_id = $i['layanan_kelurahan_id'];
                                    $layanan_kelurahan_nama = $i['kelurahan_nama'];
                                    //  $pemohon += $total
                                    ?>

                                    <tr>

                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $layanan_judul; ?></td>
                                        <td><?php echo $layanan_pemohon; ?></td>
                                        <td><?php echo $layanan_kelurahan_nama; ?></td>
                                        <td><?php echo $layanan_tanggal; ?></td>
                                        <td><?php echo $layanan_ket; ?></td>

                                    </tr>


                                <?php endforeach; ?>
                            </tbody>
                        </table>















                    </div>
</section>