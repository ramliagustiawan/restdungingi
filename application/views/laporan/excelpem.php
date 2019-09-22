<?php

header("Cache-Control: no-cache,must-revalidate");
header("Pragma: no-cache");
header("content-type: application/x-msexcel");
header("Content-Disposition: attachment; filename =pemerintahan.xls");

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