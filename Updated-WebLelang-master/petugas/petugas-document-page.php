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
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body class="body-admin-index">
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="../img/account.svg" alt="" srcset="">
            <h1>Officer</h1>
        </div>
        <div class="underline-sidebar"></div>
        <ul class="sidebar-content">
            <li class="sidebar-inactive"><img src="../img/stockcontrol.svg" class="" alt=""><a href="./petugas-sc-page.php">Stock Control</a></li>
            <li class="sidebar-inactive"><img src="../img/upload.svg" alt=""><a href="./petugas-upload-page.php">Upload Auction</a></li>
            <li class="sidebar-inactive"><img src="../img/auction.svg" class="" alt=""><a href="./petugas-auction-page.php">Auction</a></li>
            <li class="sidebar-active"><img src="../img/document.svg" class="sidebar-img-active" alt=""><a href="./petugas-document-page.php">Documents</a></li>
        </ul>
        <p>Closion.</p>
    </div> 
    <div class="main-page-admin">
        <h1 style="margin-right: 68.5rem;">Document</h1>
        <a href="./petugas-print.php">
            <button class="btn-upload"> Print</button>
        </a>
    </div>
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
    <br><br><br>  
</body>