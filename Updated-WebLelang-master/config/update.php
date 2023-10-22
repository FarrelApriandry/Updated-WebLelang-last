<?php
require_once "../config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $tgl = $_POST['tgl'];
    $harga = $_POST['harga'];
    $info = $_POST['info'];

    // Perform the update query
    $sql = "UPDATE barang SET nama = '$nama',  tgl = '$tgl', harga = '$harga', info = '$info' WHERE nama = '$nama'";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the main page after updating
        header("Location: ../admin/admin-auction-page.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
