<!--============================= potensi =============================-->
<title><?= $judul; ?></title>
<section class="welcome_about">
    <div class="container ">
        <div class="row mb-1">
            <div class="col-md-12">

                <div class="contact-title">
                    <h2>Potensi Wilayah</h2>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="display" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Potensi</th>
                                <th>Kelurahan</th>
                                <th>Detail</th>
                            </tr>

                        </thead>

                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data->result_array() as $i) :
                                $no++;
                                $potensi_id = $i['potensi_id'];
                                $potensi_judul = $i['potensi_judul'];
                                $potensi_ket = $i['potensi_ket'];
                                $potensi_gambar = $i['potensi_gambar'];

                                $potensi_kelurahan_id = $i['potensi_kelurahan_id'];
                                $potensi_kelurahan_nama = $i['kelurahan_nama'];

                                ?>

                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><img src="<?php echo base_url() . 'assets/images/' . $potensi_gambar; ?>" style="width:80px;"></td>
                                    <td><?php echo $potensi_judul; ?></td>
                                    <td><?php echo $potensi_kelurahan_nama; ?></td>
                                    <td><a href="<?php echo base_url() . 'potensi/detail/' . $potensi_id; ?> " class="badge badge-success">Detail Potensi</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
</section>