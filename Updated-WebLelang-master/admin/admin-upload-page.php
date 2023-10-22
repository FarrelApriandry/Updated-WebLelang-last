<?php
session_start();

include '../config/db.php';
include '../config/template.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $gambar = $_FILES["gambar"]["name"];
    $tmp = $_FILES["gambar"]["tmp_name"];
    $nama = $_POST["nama"];
    $tgl = $_POST["tgl"];
    $harga = $_POST["harga"];
    $info = $_POST["info"];
    $nama_gambar = rand(0, 999);

    // Move the uploaded file to the destination folder
    move_uploaded_file($tmp, "../upload/" . $nama_gambar);

    // Insert data into the 'barang' table
    $sql_barang = "INSERT INTO barang (gambar, nama, tgl, harga, info) VALUES (?, ?, ?, ?, ?)";
    $stmt_barang = $conn->prepare($sql_barang);
    $stmt_barang->bind_param('sssss', $nama_gambar, $nama, $tgl, $harga, $info);

    // Insert data into the 'lelang' table
    $id_lelang = 1; // You need to set the value of id_lelang as needed
    $harga_akhir = 0; // You need to set the value of harga_akhir as needed
    $status = 'ditutup'; // You need to set the status as needed

    $sql_lelang = "INSERT INTO lelang (id_lelang, nama, tgl, harga_akhir, status) VALUES (?, ?, ?, ?, ?)";
    $stmt_lelang = $conn->prepare($sql_lelang);
    $stmt_lelang->bind_param('issss', $id_lelang, $nama, $tgl, $harga_akhir, $status);

    // Execute both queries
    if ($stmt_barang->execute() && $stmt_lelang->execute()) {
        header("Location: ./admin-auction-page.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt_barang->close();
    $stmt_lelang->close();
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body class="body-admin-index">
    <div class="sidebar"  >
        <div class="sidebar-header">
            <img src="../img/account.svg" alt="" srcset="">
            <h1>Admin</h1>
        </div>
        <div class="underline-sidebar"></div>
        <ul class="sidebar-content">
            <li class="sidebar-inactive"><img src="../img/auction.svg" alt=""><a href="./admin-auction-page.php">Auction</a></li>
            <li class="sidebar-active"><img src="../img/upload.svg" class="sidebar-img-active" alt=""><a href="./admin-upload-page.php">Upload Auction</a></li>
            <li class="sidebar-inactive"><img src="../img/document.svg" alt=""><a href="./admin-document-page.php">Documents</a></li>
        </ul>
        <p>Closion.</p>
    </div>
    <div class="upload-page-admin">
        <h1>Upload Auction</h1>
        <a href="./admin-auction-page.php">
            <button class="btn-upload">Auction</button>
        </a>
    </div>
    <div class="upload-auction-container">
        <form action="admin-upload-page.php" method="POST" enctype="multipart/form-data">
            <div class="upload-auction-content">
                <input type='file' name="gambar" id="gambar" accept="image/*" autocomplete="off" required>
                <label for="gambar"><img src="../img/upload-btn.svg" alt="" srcset="" >Upload your Image</label>
                <input type="text"name="nama" id="nama" autocomplete="off" required placeholder="Name">
                <input type="date" name="tgl" id="tgl"  value="<?= $tglHariIni; ?>" autocomplete="off" required>
                <input type="number" name="harga" id="harga" autocomplete="off" required placeholder="OpenBid">
                <textarea id="big-input-text" name="info" id="info" autocomplete="off" required placeholder="Description"></textarea>
                <input class="btn-upload-submit" type="submit" value="UPLOAD">
            </div>
        </form>
    </div>
    <script src="../js/main.js"></script>
</body>