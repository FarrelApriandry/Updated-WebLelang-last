<?php

session_start();
$message = '';

include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query to check user credentials
    $query = "SELECT * FROM masyarakat WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $username =$row['username'];
        $email = $row['email'];
        $password = $row['password'];
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        mysqli_close($conn);
        header("Location: ./masyarakat-index.php");
        exit();
    } else {
        $message = "Invalid email or password";
    }

}

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
    <h1> Closion</h1>
    <div class="card">
        <div class="login-admin-masyarakat-container">
            <a href="../admin/admin-login.php">
                <button class="admin-change-page">ADMIN</buttona>
            </a>
            <button class="user-page">USER</button>
        </div>
        <?php if (isset($errorMsg)) { ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php echo $errorMsg; ?>
            </div>
            <?php } ?>
        <form action="" method="POST">
            <div class="input-login-form">
                <br>
                <br>
                <p class="p-email-password">EMAIL ADDRESS :</p>
                <input type="text" name="email" id="email">
                <p class="p-email-password">PASSWORD :</p>
                <input type="password" name="password" id="password">
                <br><br>
                <br>
                <input class="btn-submit" type="submit" value="SIGN IN">
                <br><br>
                <br><br>
                <p class="footer-login-form">closion.</p>
            </div>
        </form>
    </div>
</body>
</html>