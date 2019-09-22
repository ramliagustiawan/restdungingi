<!--============================= Trantib  =============================-->
<title><?= $judul; ?></title>
<section class="contact" style="margin-bottom:50px;">

    <div class="container ">
        <div class="row">
            <div class="col-md-12">

                <div class="contact-title">
                    <h2>Data Base Ketentraman Dan Ketertiban</h2>
                </div>
            </div>
        </div>

        <!-- tombol pdf -->

        <a href="<?php echo base_url() . 'trantib/cetak/'; ?>" target="blank" class="btn btn-danger"><span class="fa fa-file-pdf-o"></span> Print PDF</a>

        <!-- tombol excel -->

        <a href="<?php echo base_url() . 'trantib/excel/'; ?>" target="blank" class="btn btn-success" style="margin-left: 1px;"><span class="fa fa-file-excel-o"></span> Export Excel</a>

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
                            foreach ($trantib->result_array() as $i) :
                                $no++;
                                $trantib_id = $i['trantib_id'];
                                $trantib_judul = $i['trantib_judul'];
                                $trantib_author = $i['trantib_author'];
                                $trantib_hbt = $i['trantib_hbt'];
                                $trantib_lib = $i['trantib_lib'];
                                $trantib_tld = $i['trantib_tld'];
                                $trantib_tom = $i['trantib_tom'];
                                $trantib_tomsel = $i['trantib_tomsel'];
                                $trantib_total = $i['trantib_total'];

                                $jumlah = $trantib_hbt + $trantib_lib + $trantib_tld + $trantib_tom + $trantib_tomsel;;
                                $trantib_datatrantib_id = $i['trantib_datatrantib_id'];
                                $trantib_datatrantib_nama = $i['datatrantib_nama'];
                                ?>

                                <tr>
                                    <td style="text-align:center"><?php echo $no; ?></td>
                                    <td><?php echo $trantib_datatrantib_nama; ?></td>
                                    <td><?php echo $trantib_judul; ?></td>
                                    <td style="text-align:center"><?php echo $trantib_hbt; ?></td>
                                    <td style="text-align:center"><?php echo $trantib_lib; ?></td>
                                    <td style="text-align:center"><?php echo $trantib_tld; ?></td>
                                    <td style="text-align:center"><?php echo $trantib_tom; ?></td>
                                    <td style="text-align:center"><?php echo $trantib_tomsel; ?></td>
                                    <td style="text-align:center"><?php echo $jumlah; ?></td>


                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
</section>