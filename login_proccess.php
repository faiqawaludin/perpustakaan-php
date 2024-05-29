<?php
    session_start();

    include_once("./connect.php");

    $error_message = '';

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Prepare the SQL statement to prevent SQL injection
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                $_SESSION['email'] = $email;
                header("Location: index.php");
                exit;
            } else {
                $error_message = "Password salah.";
            }
        } else {
            $error_message = "Email tidak ditemukan.";
        }
        
        $stmt->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .centered-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .notification-box {
            width: 50%;
        }
    </style>
</head>
<body>
    <div class="container centered-container">
        <div class="notification-box">
            <?php if ($error_message): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error_message; ?>
                    <a href="login.php" class="alert-link">Coba lagi</a>.
                </div>
            <?php else: ?>
                <div class="alert alert-info" role="alert">
                    Silakan login melalui <a href="login.php" class="alert-link">halaman login</a>.
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
