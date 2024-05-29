<?php
    include_once("./connect.php");

    if(isset($_POST["submit"])) {
        $nama = $_POST["nama"];
        $isbn = $_POST["isbn"];
        $unit = $_POST["unit"];

        $query = mysqli_query($db, "INSERT INTO buku VALUES (
            NULL, '$nama', '$isbn', '$unit'
        ) ");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                    </ul>
                    <form action="logout_proccess.php" method="POST" class="d-flex">
                        <button type="submit" class="btn btn-outline-danger btn-sm" name="submit">Logout</button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="container w-50 mt-5">
            <h1 class="mb-4">Form Tambah Data Buku</h1>
            
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <div class="mb-3">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" required>
                </div>

                <div class="mb-3">
                    <label for="unit" class="form-label">Unit</label>
                    <input type="text" class="form-control" id="unit" name="unit" required>
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
            <div class="text-left mt-3">
                <a href="./buku.php" class="text-decoration-none">Kembali ke Menu Daftar Buku</a>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-7RXgkmEzQ+Wq0xJSJ3jIX6gwJ2OCEob8lzyd/vKO3cQZPtnAohjGJ9+BNO2yup7f" crossorigin="anonymous"></script>
</body>
</html>
