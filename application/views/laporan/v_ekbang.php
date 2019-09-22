<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <title>
        Laporan
    </title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px;
            solid #000;
        }
    </style>

</head>

<body>
    <img src="theme/images/kota.png" style="position: absolute; width: 75px; height: auto;" alt="Kota Gorontalo">
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1.6; font-weight: bold; font-size: 23px;">
                    PEMERINTAH KOTA GORONTALO
                </span>

                <br>
                <span style="line-height: 1.6; font-weight: bold; font-size: 18px;">
                    KECAMATAN DUNGINGI
                </span>
                <br>
                <span style="line-height: 1.6; font-weight: bold; font-size: 13px;">
                    Jalan Apel II Telp (0435)8526697 Email: dungingioffice@gmail.com
                </span>

            </td>
        </tr>
    </table>
    <hr class="line-title">

    <!--============================= Ekbang =============================-->

    <div align="center" class="contact-title mt-15">
        <h2>Data Base Ekonomi Pembangunan</h2>
    </div>



    <table id="display" class="table table-striped" style="font-size:12px;">
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



</body>

</html>