<?php
session_start();
require_once "../config/db.php";
require_once "../config/template.php";

if (!isset($_SESSION['username'])) {
    header("Location: ./petugas-login.php");
    exit();
}

$username = $_SESSION['username'];

$sql_barang = "SELECT gambar, nama, tgl, harga, info FROM barang";
$stmt_barang = $conn->query($sql_barang);

$sql_lelang = "SELECT status FROM lelang";
$stmt_lelang = $conn->query($sql_lelang);

$data_barang = array();
$data_lelang = array();

if ($stmt_barang->num_rows > 0 && $stmt_lelang->num_rows > 0) {
    while ($row = $stmt_barang->fetch_assoc()) {
        $data_barang[] = $row;
    }
    while ($row = $stmt_lelang->fetch_assoc()) {
        $data_lelang[] = $row;
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
            <li class="sidebar-inactive"><img src="../img/stockcontrol.svg"  class="" alt=""><a href="./petugas-sc-page.php">Stock Control</a></li>
            <li class="sidebar-inactive"><img src="../img/upload.svg" alt=""><a href="./petugas-upload-page.php">Upload Auction</a></li>
            <li class="sidebar-active"><img src="../img/auction.svg" class="sidebar-img-active" alt=""><a href="./petugas-auction-page.php">Auction</a></li>
            <li class="sidebar-inactive"><img src="../img/document.svg" alt=""><a href="./petugas-document-page.php">Documents</a></li>
        </ul>
        <p>Closion.</p>
    </div> 
    <div class="main-page-admin">
        <h1>Auction</h1>
        <input class="search-input-admin" type="text" placeholder="Search" style="margin-right: 37rem;">
        <a href="./admin-upload-page.php">
            <button class="btn-upload">+ add</button>
        </a>
    </div>
    <table class="table-container">
        <tr class="table-container-header">
            <th>Image</th>
            <th>Name</th>
            <th>Upload Date</th>
            <th>Open Bid</th>
            <th>Description</th>
            <th>Status</th>
        </tr>
        <?php foreach ($data_barang as $key => $row) {
            $status = isset($data_lelang[$key]['status']) ? $data_lelang[$key]['status'] : '';
        ?>
            <tr class="table-content">
                <th class="centered-th"><img src="../upload/<?= $row['gambar']; ?>" width="100"></th>
                <th><?= $row['nama']; ?></th>
                <th><?= $row['tgl']; ?></th>
                <th><?= number_format($row['harga'], 2, '.', ','); ?></th>
                <th><?= $row['info']; ?></th>
                <th style="justify-content: center;">
                    <?php
                        if ($status == "") {
                    ?>
                        <a class="" id="openLelang" id="closeLelang" id1="<?= $id_barang; ?>" title="Tutup">
                            <img src="../img/questionbox.svg" style="width: 60px; padding-left:80px;" alt="" srcset="">
                        </a>
                    <?php 
                        } else if ($status == "ditutup") {
                    ?>
                        <img src="../img/checkmark.svg" style="width: 60px; padding-left:80px;" alt="" srcset="">
                    <?php 
                        } else {
                    ?>
                        <a class="" id="openLelang" id="openLelang" id1="<?= $id_barang; ?>" title="Dibuka">
                            <img src="../img/checkbox.svg" style="width: 60px; padding-left:80px;" alt="" srcset="">
                        </a>
                    <?php
                        }   
                    ?>
                </th>
            </tr>
        <?php } ?>
    </table>
    <br><br><br>
        <script>
        $(document).ready(function() {
            $('#lelang').dataTable();
        $(document).on('click', '#closeLelang', function() {
        var id_barang = $(this).attr('id1');
        $.ajax({
            method: 'POST',
            data: {
            id_barang: id_barang
            },
            url: 'lelang-simpan-ajax.php',
            cache: false,
            success: function() {
            $('.tampilkanLelang').load('lelang-tampil.php', {
                id_barang: id_barang
                });
            }
        });      
        });
        $(document).on('click', '#openLelang', function() {
        var id_barang = $(this).attr('id1');
        $.ajax({
            method: 'POST',
            data: {
            id_barang: id_barang
            },
            url: 'lelang-simpan-ajax.php',
            cache: false,
            success: function() {
            $('.tampilkanLelang').load('lelang-tampil.php', {
                id_barang: id_barang
                });
            }
        });      
        });
        });
    </script>
</body>
