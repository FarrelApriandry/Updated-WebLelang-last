<?php

include '../config/db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve data from the form
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // SQL query to insert data into the "masyarakat" table
    $sql = "INSERT INTO masyarakat (username, email, password) VALUES (?, ?, ?)";

    // Prepare and execute the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        // Registration successful, redirect to citizen-login.php
        header("Location: ./masyarakat-login.php");
        exit(); // Make sure to exit after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $stmt->close();
}

$conn->close();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register-Page | Closion</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="body-masyarakat-login">
    <br><br>
    <h1> Closion</h1>
    <div class="card">
        <div class="login-admin-masyarakat-container">
            <a href="../admin/admin-register.php">
                <button class="admin-change-page">ADMIN</buttona>
            </a>
            <button class="user-page">USER</button>
        </div>
        <!-- <div class="underline-login-form"></div> -->
        <form action="" method="POST">
            <div class="input-login-form">
                <br><br>
                <p class="p-email-password">USERNAME :</p>
                <input type="text" id="username" name="username" required
                        oninvalid="this.setCustomValidity('Tabel tidak boleh kosong!')"
                        onchange="this.setCustomValidity('')">
                <p class="p-email-password">EMAIL ADDRESS :</p>
                <input type="text" id="email" name="email" required
                        oninvalid="this.setCustomValidity('Tabel tidak boleh kosong!')"
                        onchange="this.setCustomValidity('')">
                <p class="p-email-password">PASSWORD :</p>
                <input type="password" name="password" id="password"required
                        oninvalid="this.setCustomValidity('Tabel tidak boleh kosong!')"
                        onchange="this.setCustomValidity('')">
                <br><br>
                <br>
                <input class="btn-submit" type="submit" value="REGISTER">
                <br><br>
                <br><br>
                <p class="footer-login-form">closion.</p>
            </div>
        </form>
    </div>
</body>
</html>