<?php
    include_once("./connect.php");

    $query = mysqli_query($db, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
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

    <div class="container w-75">
        <h1 class="my-4">Daftar Buku</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($query as $buku) { ?>
                <tr>
                    <td><?php echo $buku["nama"] ?></td>
                    <td><?php echo $buku["isbn"] ?></td>
                    <td><?php echo $buku["unit"] ?></td>
                    <td>
                        <a href=<?php echo "edit-buku.php?id=" . $buku["id"] ?> class="btn btn-warning btn-sm">EDIT</a>
                        <a href=<?php echo "delete-buku.php?id=" . $buku["id"] ?> class="btn btn-danger btn-sm">HAPUS</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <a href="./tambah-buku.php" class="btn btn-success w-5 mt-2">Tambah Data Buku</a>
        <a href="./index.php" class="btn btn-secondary w-5 mt-2">Kembali ke Halaman Utama</a>
    </div>    
</body>
</html>
