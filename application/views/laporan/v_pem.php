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

    <!--============================= Pemerintahan =============================-->

    <div align="center" class="contact-title mt-15">
        <h2>Data Base Pemerintahan</h2>
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




</body>

</html>