<!--============================= EKTP =============================-->

<title><?= $judul; ?></title>
<section class="welcome_about">
    <div class="container">
        <div class="row">

            <div class="contact-title">
                <h2>Data E-KTP</h2>
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
                                    <th>Nama </th>
                                    <th>kelurahan</th>
                                    <th>alamat</th>
                                    <th>Keterangan</th>

                                </tr>

                            </thead>

                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data as $i) :

                                    ?>

                                    <tr>

                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $i->ektp_judul; ?></td>
                                        <td><?php echo $i->ektp_kelurahan_id; ?></td>
                                        <td><?php echo $i->ektp_alamat; ?></td>
                                        <td><?php echo $i->ektp_ket; ?></td>

                                    </tr>


                                <?php endforeach; ?>
                            </tbody>
                        </table>















                    </div>
</section>