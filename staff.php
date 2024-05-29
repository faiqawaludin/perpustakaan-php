<?php
    include_once("./connect.php");

    $query = mysqli_query($db, "SELECT * FROM staff");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Staff</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card {
            margin-bottom: 20px;
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
                    </ul>
                    <form action="logout_proccess.php" method="POST" class="d-flex">
                        <button type="submit" class="btn btn-outline-danger btn-sm" name="submit">Logout</button>
                    </form>
                </div>
            </div>
        </nav>

    <div class="container">
        <h1 class="my-4">Daftar Staff</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-5">
            <?php foreach($query as $staff) { ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $staff['nama']; ?></h5>
                            <p class="card-text">No Telp: <?php echo $staff['telp']; ?></p>
                            <p class="card-text">Email: <?php echo $staff['email']; ?></p>
                            <div class="d-flex justify-content-end">
                                <a href=<?php echo "edit-staff.php?id=" . $staff["id"]; ?> class="btn btn-primary me-2">EDIT</a>
                                <a href=<?php echo "delete-staff.php?id=" . $staff["id"]; ?> class="btn btn-danger">HAPUS</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <br>
        <a href="./tambah-staff.php" class="btn btn-success">Tambah Data Staff</a>
        <a href="./index.php" class="btn btn-secondary">Kembali ke Halaman Utama</a>
    </div>    
</body>
</html>
