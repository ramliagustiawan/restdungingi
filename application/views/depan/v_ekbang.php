<!--============================= Ekbang =============================-->
<title><?= $judul; ?></title>
<section class="contact" style="margin-bottom:50px;">

    <div class="container ">
        <div class="row">
            <div class="col-md-12">

                <div class="contact-title">
                    <h2>Data Base Ekonomi Pembangunan</h2>
                </div>
            </div>
        </div>
        <!-- tombol pdf -->

        <a href="<?php echo base_url() . 'ekbang/cetak/'; ?>" target="blank" class="btn btn-danger"><span class="fa fa-file-pdf-o"></span> Print PDF</a>

        <!-- tombol excel -->

        <a href="<?php echo base_url() . 'ekbang/excel/'; ?>" target="blank" class="btn btn-success" style="margin-left: 1px;"><span class="fa fa-file-excel-o"></span> Export Excel</a>

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
                            foreach ($ekbang->result_array() as $i) :
                                $no++;
                                $ekbang_id = $i['ekbang_id'];
                                $ekbang_judul = $i['ekbang_judul'];
                                $ekbang_author = $i['ekbang_author'];
                                $ekbang_hbt = $i['ekbang_hbt'];
                                $ekbang_lib = $i['ekbang_lib'];
                                $ekbang_tld = $i['ekbang_tld'];
                                $ekbang_tom = $i['ekbang_tom'];
                                $ekbang_tomsel = $i['ekbang_tomsel'];
                                $ekbang_total = $i['ekbang_total'];
                                $jumlah = $ekbang_hbt + $ekbang_lib + $ekbang_tld + $ekbang_tom + $ekbang_tomsel;;

                                $ekbang_dataekbang_id = $i['ekbang_dataekbang_id'];
                                $ekbang_dataekbang_nama = $i['dataekbang_nama'];
                                // $jumlah += $jumlah;
                                ?>

                                <tr>
                                    <td style="text-align:center"><?php echo $no; ?></td>
                                    <td><?php echo $ekbang_dataekbang_nama; ?></td>
                                    <td><?php echo $ekbang_judul; ?></td>
                                    <td style="text-align:center"><?php echo $ekbang_hbt; ?></td>
                                    <td style="text-align:center"><?php echo $ekbang_lib; ?></td>
                                    <td style="text-align:center"><?php echo $ekbang_tld; ?></td>
                                    <td style="text-align:center"><?php echo $ekbang_tom; ?></td>
                                    <td style="text-align:center"><?php echo $ekbang_tomsel; ?></td>
                                    <td style="text-align:center"><?php echo $jumlah; ?></td>


                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
</section>