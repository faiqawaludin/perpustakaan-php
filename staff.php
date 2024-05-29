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
    <div class="container">
        <h1 class="my-4">Daftar Staff</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php foreach($query as $staff) { ?>
                <div class="col">
                    <div class="card">
                        <img src="<?php echo $staff['foto']; ?>" class="card-img-top" alt="Foto Staff">
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
