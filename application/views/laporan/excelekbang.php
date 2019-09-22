<?php

header("Cache-Control: no-cache,must-revalidate");
header("Pragma: no-cache");
header("content-type: application/x-msexcel");
header("Content-Disposition: attachment; filename =ekbang.xls");

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
    <span style="margin-left: 20px;"><b>Data Base Ekonomi Pembnagunan</b></span>

</div>

<table border="1">
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