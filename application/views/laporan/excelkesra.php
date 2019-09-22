<?php

header("Cache-Control: no-cache,must-revalidate");
header("Pragma: no-cache");
header("content-type: application/x-msexcel");
header("Content-Disposition: attachment; filename =kesra.xls");

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