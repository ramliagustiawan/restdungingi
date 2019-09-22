<!--============================= Nonnonijin =============================-->
<title><?= $judul; ?></title>
<section class="welcome_about">
    <div class="container ">
        <div class="row mb-1">
            <div class="col-md-12">

                <div class="contact-title">
                    <h2>Layanan Non Perijinan</h2>
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
                                <th>Jenis Layanan</th>
                                <th>Keterangan</th>
                                <th>Detail</th>
                            </tr>

                        </thead>

                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($nonijin->result() as $noni) :
                                $no++;
                                $judul = ['nonijin_judul'];
                                //    $isi=['nonijin_isi'];
                                $ket = ['nonijin_ket'];
                                ?>

                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $noni->nonijin_judul; ?></td>
                                    <td><?php echo $noni->nonijin_ket; ?></td>
                                    <!-- <td><?php echo $noni->nonijin_ket; ?></td> -->
                                    <td><a href="<?php echo base_url() . 'nonijin/detail/' . $noni->nonijin_id; ?> " class="badge badge-success">Detail Layanan</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
</section>