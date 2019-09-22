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

    <!--============================= Trantib =============================-->

    <div align="center" class="contact-title mt-15">
        <h2>Data Base Trantibum</h2>
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




</body>

</html>