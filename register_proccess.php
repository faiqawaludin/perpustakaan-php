<?php
    session_start();

    include_once("./connect.php");

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) > 0) {
            $message = "Email sudah terdaftar.";
            $alertType = "danger";
        } else {
            $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

            if (mysqli_query($db, $sql) === TRUE) {
                $message = "Registrasi berhasil. Silahkan <a href='login.php' class='alert-link'>login</a>.";
                $alertType = "success";
            } else {
                $message = "Registrasi gagal!";
                $alertType = "danger";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Process</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="container">
        <div class="alert alert-<?php echo $alertType; ?>" role="alert">
            <?php echo $message; ?>
        </div>
        <?php if ($alertType == "danger") { ?>
            <a href="register.php" class="btn btn-primary">Kembali ke Register</a>
        <?php } ?>
    </div>
</body>
</html>
