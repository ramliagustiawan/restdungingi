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

    <!--============================= kesra =============================-->

    <div align="center" class="contact-title mt-15">
        <h2>Data Base Pemberdayaan dan Kesra</h2>
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



</body>

</html>