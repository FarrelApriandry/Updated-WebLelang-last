<?php

    require_once "../config/db.php";

    $sql = "SELECT gambar, nama, tgl, harga, info FROM barang";
    $result = $conn->query($sql);

    $data = array();
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

    $conn->close();
    
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Cetak Barang Lelang</title>
    <link rel="shorcut icon" type="text/css" href="img/daki.png">
    <link rel="stylesheet" href="css/bootstrap-4_4_1.min.css"/>

    <style>
        .box-header{margin-left: 30px; margin-top: 20px; margin-bottom: 5px;}
        tr>th{text-align: center; height: 35px; border: 2px solid;}
        tr>td{padding-left: 5px; vertical-align: middle!important;}
        tr>td>img{margin-top: 3px; margin-bottom: 3px;}
        #cetak{margin-left: 30px; margin-right: 30px;}
        .table-container {border-collapse: collapse;}
    </style>
    </head>
    <body onload="window.print(); window.onafterprint = window.close; setTimeout(closePageAfterPrintDialog, 1000);">
    <br><br>
    <div style="display: flex; flex-direction:column;">
            <span style="margin-left: 10px; font-size: 24px; text-align: center;">Recap Closion</span>
            <br>
            <table class="table-container">
                <tr class="table-container-header">
                    <th>Image</th>
                    <th>Name</th>
                    <th>Upload Date</th>
                    <th>Open Bid</th>
                    <th>Description</th>
                </tr>
                <?php foreach ($data as $row) {?>
                    <tr class="table-content">
                        <th class="centered-th"><img src="../upload/<?=$row['gambar']; ?>" width="100"></th>
                        <th><?php echo $row['nama']; ?></th>
                        <th><?php echo $row['tgl']; ?></th>
                        <th><?php echo number_format($row['harga'], 2, '.', ','); ?></th>
                        <th><?php echo $row['info']; ?></th>
                    </tr>
                <?php } ?>
            </table>
    </div>
    </body>
</html>