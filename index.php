<?php
    session_start();

    if (!isset($_SESSION["email"])) {
        header("Location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f0f2f5;
        }
        .container {
            margin-top: 50px;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        .card {
            flex: 1 1 calc(50% - 20px);
            max-width: calc(50% - 20px);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Aplikasi Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Data
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="./buku.php">Daftar Buku</a></li>
                            <li><a class="dropdown-item" href="./staff.php">Daftar Staff</a></li>
                        </ul>
                    </li>
                </ul>
                <form action="logout_proccess.php" method="POST" class="d-flex">
                    <button type="submit" class="btn btn-outline-danger btn-sm" name="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container w-75">
        <h1 class="text-center mb-4">Selamat Datang di Aplikasi Perpustakaan</h1>
        <p class="text-center">Silakan pilih menu di bawah untuk melihat daftar buku atau staff.</p>
        <div class="card-container">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Daftar Buku</h5>
                    <p class="card-text">Lihat daftar buku yang tersedia di perpustakaan.</p>
                    <a href="./buku.php" class="btn btn-primary">Lihat Buku</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Daftar Staff</h5>
                    <p class="card-text">Lihat daftar staff yang bekerja di perpustakaan.</p>
                    <a href="./staff.php" class="btn btn-primary">Lihat Staff</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ND32VjtJxrF8FRgdpKaFShoHeI+mKSnB+9nsW+nb67DbdA0cltZlHwdM83COY5Wf" crossorigin="anonymous"></script>
</body>
</html>
