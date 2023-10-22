<?php
require_once "../config/db.php";

if (isset($_GET['nama'])) {
    $nama = $_GET['nama'];

    // Fetch the record from the database using 'nama'
    $sql = "SELECT * FROM barang WHERE nama = '$nama'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // You can use $row to pre-fill an edit form
    } else {
        echo "Record not found.";
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/edit.css">
</head>
<body>
    <h1>Edit Record</h1>
    <!-- Create an edit form with pre-filled values from $row -->
    <form action="../config/update.php" method="POST">
        <label for="nama"> Items Name:</label>
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br>
        <label for="tgl">Upload Date:</label>
        <input type="text" name="tgl" value="<?php echo $row['tgl']; ?>"><br>

        <label for="harga">Open Bid:</label>
        <input type="text" name="harga" value="<?php echo $row['harga']; ?>"><br>

        <label for="info">Description:</label>
        <textarea name="info"><?php echo $row['info']; ?></textarea><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
