<?php

include '../config/db.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "INSERT INTO admin (username, email, password) VALUES (?, ?, ?)";

    $stmt =$conn->prepare($sql);
    $stmt->bind_param('sss', $username, $email, $password);

    if ($stmt->execute()) {
        header("Location: ./admin-login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

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
    <title>Login-Page | Closion</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="body-masyarakat-login">
    <br><br>
    <h1> Closion</h1>
    <div class="card">
        <div class="login-admin-masyarakat-container">
            <button class="user-page">ADMIN</buttona>
            <a href="../masyarakat/masyarakat-register.php">
                <button class="admin-change-page">USER</button>
            </a>
        </div>
        <!-- <div class="underline-login-form"></div> -->
            <form action="" method="POST">
                <div class="input-login-form">
                    <br><br>
                    <p class="p-email-password">USERNAME :</p>
                    <input type="text" name="username" id="username">
                    <p class="p-email-password">EMAIL ADDRESS :</p>
                    <input type="text" name="email" id="email">
                    <p class="p-email-password">PASSWORD :</p>
                    <input type="password" name="password" id="password">
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