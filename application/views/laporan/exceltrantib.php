<?php

header("Cache-Control: no-cache,must-revalidate");
header("Pragma: no-cache");
header("content-type: application/x-msexcel");
header("Content-Disposition: attachment; filename =trantib.xls");

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