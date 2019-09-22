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
        <h2>Laporan Penduduk Kecamatan Dungingi</h2>
    </div>



    <table border="1" class="table table-striped" id="display" style="font-size:10px;">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Kelurahan</th>
                <th rowspan="2">Tanggal</th>
                <th colspan="3">Penduduk Awal Bulan ini</th>
                <th colspan="3">Lahir Bulan Ini</th>
                <th colspan="3">Meninggal Bulan ini</th>
                <th colspan="3">Datang Bulan ini</th>
                <th colspan="3">Pergi Bulan Ini</th>
                <th colspan="3">Penduduk Akhir bulan ini</th>

                <!-- <th style="text-align:right;">Aksi</th> -->
            </tr>
            <tr>
                <th>L</th>
                <th>p</th>
                <th>L+P</th>
                <th>L</th>
                <th>p</th>
                <th>L+P</th>
                <th>L</th>
                <th>p</th>
                <th>L+P</th>
                <th>L</th>
                <th>p</th>
                <th>L+P</th>
                <th>L</th>
                <th>p</th>
                <th>L+P</th>
                <th>L</th>
                <th>p</th>
                <th>L+P</th>
            </tr>
        </thead>
        <tbody></tbody>
        <?php
        $no = 1;
        $total1 = 0;
        $total2 = 0;
        $total3 = 0;
        $total4 = 0;
        $total5 = 0;
        $total6 = 0;
        $total7 = 0;
        $total8 = 0;
        $total9 = 0;
        $total10 = 0;
        $total11 = 0;
        $total12 = 0;
        $total13 = 0;
        $total14 = 0;
        $total15 = 0;
        $total16 = 0;
        $total17 = 0;
        $total18 = 0;


        foreach ($lapen as $row) :
            $lakhir = $row->lawal + ($row->llahir + $row->ldatang) - ($row->lmati + $row->lpergi);;
            $pakhir = $row->pawal + ($row->plahir + $row->pdatang) - ($row->pmati + $row->ppergi);;
            $lpakhir = $lakhir + $pakhir;;

            $total1 += $row->lawal;
            $total2 += $row->pawal;
            $total3 += $row->lawal + $row->pawal;
            $total4 += $row->llahir;
            $total5 += $row->plahir;
            $total6 += $row->llahir + $row->plahir;
            $total7 += $row->lmati;
            $total8 += $row->pmati;
            $total9 += $row->lmati + $row->pmati;
            $total10 += $row->ldatang;
            $total11 += $row->pdatang;
            $total12 += $row->ldatang + $row->pdatang;
            $total13 += $row->lpergi;
            $total14 += $row->ppergi;
            $total15 += $row->lpergi + $row->ppergi;
            $total16 += $lakhir;
            $total17 += $pakhir;
            $total18 += $lpakhir;

            ?>

            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->kelurahan ?></td>
                <td><?php echo date('d-m-Y', strtotime($row->tanggal)); ?></td>
                <td><?php echo number_format($row->lawal, 0, ',', '.') ?></td>
                <td><?php echo number_format($row->pawal, 0, ',', '.') ?></td>
                <td><?php echo number_format($row->lawal + $row->pawal, 0, ',', '.') ?></td>
                <td><?php echo $row->llahir ?></td>
                <td><?php echo $row->plahir ?></td>
                <td><?php echo $row->llahir + $row->plahir ?></td>
                <td><?php echo $row->lmati ?></td>
                <td><?php echo $row->pmati ?></td>
                <td><?php echo $row->lmati + $row->pmati ?></td>
                <td><?php echo $row->ldatang ?></td>
                <td><?php echo $row->pdatang ?></td>
                <td><?php echo $row->ldatang + $row->pdatang ?></td>
                <td><?php echo $row->lpergi ?></td>
                <td><?php echo $row->ppergi ?></td>
                <td><?php echo $row->lpergi + $row->ppergi ?></td>
                <td><?php echo number_format($lakhir, 0, ',', '.') ?></td>
                <td><?php echo number_format($pakhir, 0, ',', '.') ?></td>
                <td><?php echo number_format($lpakhir, 0, ',', '.') ?></td>

            </tr>




        <?php endforeach ?>

        <tr>
            <th colspan="3" style="text-align:center;">Jumlah Total</th>
            <th><?php echo number_format($total1, 0, ',', '.') ?></th>
            <th><?php echo number_format($total2, 0, ',', '.') ?></th>
            <th><?php echo number_format($total3, 0, ',', '.') ?></th>
            <th><?php echo $total4; ?></th>
            <th><?php echo $total5; ?></th>
            <th><?php echo $total6; ?></th>
            <th><?php echo $total7; ?></th>
            <th><?php echo $total8; ?></th>
            <th><?php echo $total9; ?></th>
            <th><?php echo $total10; ?></th>
            <th><?php echo $total11; ?></th>
            <th><?php echo $total12; ?></th>
            <th><?php echo $total13; ?></th>
            <th><?php echo $total14; ?></th>
            <th><?php echo $total15; ?></th>
            <th><?php echo number_format($total16, 0, ',', '.') ?></th>
            <th><?php echo number_format($total17, 0, ',', '.') ?></th>
            <th><?php echo number_format($total18, 0, ',', '.') ?></th>

        </tr>

    </table>


    <table style="width: 90%;">
        <tr>
            <td align="right">
                <span style="line-height: 1.6; font-weight: bold; font-size: 10px;">
                    Gorontalo, <?php echo date('Y'); ?>
                </span>

            </td>
        </tr>
        <tr>
            <td align="right">
                <span style="line-height: 1.6; font-weight: bold; font-size: 10px;">
                    Camat Dungingi
                </span>

            </td>
        </tr>

    </table>





</body>

</html>