<!--============================= Pemerintahan =============================-->
<title><?= $judul; ?></title>
<section class="contact" style="margin-bottom:50px;">

    <div class="container ">
        <div class="row">
            <div class="col-md-12">

                <div class="contact-title">
                    <h2>Data Base Pemerintahan</h2>
                </div>
            </div>
        </div>

        <!-- tombol pdf -->

        <a href="<?php echo base_url() . 'pem/cetak/'; ?>" target="blank" class="btn btn-danger"><span class="fa fa-file-pdf-o"></span> Print PDF</a>

        <!-- tombol excel -->

        <a href="<?php echo base_url() . 'pem/excel/'; ?>" target="blank" class="btn btn-success" style="margin-left: 1px;"><span class="fa fa-file-excel-o"></span> Export Excel</a>

        <div class="row ">
            <div class="col-md-12">
                <div class="table-responsive">


                    <table id="display" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Data</th>
                                <th>Jenis data</th>
                                <th>Huangobotu</th>
                                <th>Libuo</th>
                                <th>Tuladenggi</th>
                                <th>Tomulabutao</th>
                                <th>Tomulabutao Selatan</th>
                                <th>Jumlah Total</th>
                            </tr>

                        </thead>
                        <!-- data perum -->
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($pem->result_array() as $i) :
                                $no++;
                                $pem_id = $i['pem_id'];
                                $pem_judul = $i['pem_judul'];
                                $pem_author = $i['pem_author'];
                                $pem_hbt = $i['pem_hbt'];
                                $pem_lib = $i['pem_lib'];
                                $pem_tld = $i['pem_tld'];
                                $pem_tom = $i['pem_tom'];
                                $pem_tomsel = $i['pem_tomsel'];
                                $pem_total = $i['pem_total'];

                                $jumlah = $pem_hbt + $pem_lib + $pem_tld + $pem_tom + $pem_tomsel;;
                                $pem_datapem_id = $i['pem_datapem_id'];
                                $pem_datapem_nama = $i['datapem_nama'];
                                ?>

                                <tr>
                                    <td style="text-align:center"><?php echo $no; ?></td>
                                    <td><?php echo $pem_datapem_nama; ?></td>
                                    <td><?php echo $pem_judul; ?></td>
                                    <td style="text-align:center"><?php echo $pem_hbt; ?></td>
                                    <td style="text-align:center"><?php echo $pem_lib; ?></td>
                                    <td style="text-align:center"><?php echo $pem_tld; ?></td>
                                    <td style="text-align:center"><?php echo $pem_tom; ?></td>
                                    <td style="text-align:center"><?php echo $pem_tomsel; ?></td>
                                    <td style="text-align:center"><?php echo $jumlah; ?></td>


                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
</section>