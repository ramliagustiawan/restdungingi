<!--============================= Kesra =============================-->
<title><?= $judul; ?></title>
<section class="contact" style="margin-bottom:50px;">

    <div class="container ">
        <div class="row">
            <div class="col-md-12">

                <div class="contact-title">
                    <h2>Data Base Pemberdayaan dan Kesejahteraan Rakyat</h2>
                </div>
            </div>
        </div>
        <!-- tombol pdf -->

        <a href="<?php echo base_url() . 'kesra/cetak/'; ?>" target="blank" class="btn btn-danger"><span class="fa fa-file-pdf-o"></span> Print PDF</a>

        <!-- tombol excel -->

        <a href="<?php echo base_url() . 'kesra/excel/'; ?>" target="blank" class="btn btn-success" style="margin-left: 1px;"><span class="fa fa-file-excel-o"></span> Export Excel</a>

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
                            foreach ($kesra->result_array() as $i) :
                                $no++;
                                $kesra_id = $i['kesra_id'];
                                $kesra_judul = $i['kesra_judul'];
                                $kesra_author = $i['kesra_author'];
                                $kesra_hbt = $i['kesra_hbt'];
                                $kesra_lib = $i['kesra_lib'];
                                $kesra_tld = $i['kesra_tld'];
                                $kesra_tom = $i['kesra_tom'];
                                $kesra_tomsel = $i['kesra_tomsel'];
                                $kesra_total = $i['kesra_total'];

                                $jumlah = $kesra_hbt + $kesra_lib + $kesra_tld + $kesra_tom + $kesra_tomsel;;
                                $kesra_datakesra_id = $i['kesra_datakesra_id'];
                                $kesra_datakesra_nama = $i['datakesra_nama'];
                                ?>

                                <tr>
                                    <td style="text-align:center"><?php echo $no; ?></td>
                                    <td><?php echo $kesra_datakesra_nama; ?></td>
                                    <td><?php echo $kesra_judul; ?></td>
                                    <td style="text-align:center"><?php echo $kesra_hbt; ?></td>
                                    <td style="text-align:center"><?php echo $kesra_lib; ?></td>
                                    <td style="text-align:center"><?php echo $kesra_tld; ?></td>
                                    <td style="text-align:center"><?php echo $kesra_tom; ?></td>
                                    <td style="text-align:center"><?php echo $kesra_tomsel; ?></td>
                                    <td style="text-align:center"><?php echo $jumlah; ?></td>


                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
</section>