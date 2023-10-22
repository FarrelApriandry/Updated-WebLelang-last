<?php
require_once "../config/db.php";

if (isset($_GET['nama'])) {
    $nama = $_GET['nama'];

    // Perform the DELETE query with the 'nama' parameter
    $sql = "DELETE FROM barang WHERE nama = '$nama'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../admin/admin-auction-page.php");
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
