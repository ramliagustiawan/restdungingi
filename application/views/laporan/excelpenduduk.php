<?php

header("Cache-Control: no-cache,must-revalidate");
header("Pragma: no-cache");
header("content-type: application/x-msexcel");
header("Content-Disposition: attachment; filename =Laporan Penduduk.xls");

?>

<style type="text/css">
    table,
    th,
    td {
        border-collapse: colapse;
        padding: 15px;
        margin: 10px;
        color: #000;
    }
</style>

<div style="text-align: center;">
    <span style="margin-left: 20px;"><b>Laporan Penduduk</b></span>

</div>

<table border="1">
    <thead>
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Kelurahan</th>
            <th rowspan="2">Bulan</th>
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
    <!-- data perum -->
    <?php
    $no = 0;
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

    foreach ($data->result_array() as $i) :

        $no++;
        $id = $i['id'];
        $kelurahan = $i['kelurahan'];
        $tanggal = $i['tanggal'];
        $lawal = $i['lawal'];
        $pawal = $i['pawal'];
        $lpawal = $lawal + $pawal;;
        $llahir = $i['llahir'];
        $plahir = $i['plahir'];
        $lplahir = $llahir + $plahir;;
        $lmati = $i['lmati'];
        $pmati = $i['pmati'];
        $lpmati = $lmati + $pmati;;
        $ldatang = $i['ldatang'];
        $pdatang = $i['pdatang'];
        $lpdatang = $ldatang + $pdatang;;
        $lpindah = $i['lpergi'];
        $ppindah = $i['ppergi'];


        $lppindah = $lpindah + $ppindah;;
        // $lakhir = $i['lakhir'];
        // $pakhir = $i['pakhir'];
        // $lpakhir = $i['lpakhir'];

        $lakhir = $lawal + ($llahir + $ldatang) - ($lmati + $lpindah);;
        $pakhir = $pawal + ($plahir + $pdatang) - ($pmati + $ppindah);;
        $lpakhir = $lakhir + $pakhir;;

        $total1 += $lawal;
        $total2 += $pawal;
        $total3 += $lpawal;
        $total4 += $llahir;
        $total5 += $plahir;
        $total6 += $lplahir;
        $total7 += $lmati;
        $total8 += $pmati;
        $total9 += $lpmati;
        $total10 += $ldatang;
        $total11 += $pdatang;
        $total12 += $lpdatang;
        $total13 += $lpindah;
        $total14 += $ppindah;
        $total15 += $lppindah;
        $total16 += $lakhir;
        $total17 += $pakhir;
        $total18 += $lpakhir;


        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $kelurahan; ?></td>
            <td><?php echo $tanggal; ?></td>
            <td><?php echo number_format($lawal, 0, ',', '.') ?></td>
            <td><?php echo number_format($pawal, 0, ',', '.') ?></td>
            <td><?php echo number_format($lpawal, 0, ',', '.') ?></td>
            <td><?php echo $llahir; ?></td>
            <td><?php echo $plahir; ?></td>
            <td><?php echo $lplahir; ?></td>
            <td><?php echo $lmati; ?></td>
            <td><?php echo $pmati; ?></td>
            <td><?php echo $lpmati; ?></td>
            <td><?php echo $ldatang; ?></td>
            <td><?php echo $pdatang; ?></td>
            <td><?php echo $lpdatang; ?></td>
            <td><?php echo $lpindah; ?></td>
            <td><?php echo $ppindah; ?></td>
            <td><?php echo $lppindah; ?></td>
            <td><?php echo number_format($lakhir, 0, ',', '.') ?></td>
            <td><?php echo number_format($pakhir, 0, ',', '.') ?></td>
            <td><?php echo number_format($lpakhir, 0, ',', '.') ?></td>

        </tr>

    <?php endforeach; ?>

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