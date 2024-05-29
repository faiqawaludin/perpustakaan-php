<?php
include_once("./connect.php");

// Fetch existing staff data based on ID (example: $_GET['id'])
$staff_id = $_GET['id'];
$staff = $db->query("SELECT * FROM staff WHERE id = $staff_id")->fetch_assoc();

if(isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $telp = $_POST["telp"];
    $email = $_POST["email"];

    // Use prepared statements to prevent SQL injection and handle special characters
    $stmt = $db->prepare("UPDATE staff SET nama = ?, telp = ?, email = ? WHERE id = ?");
    $stmt->bind_param("sssi", $nama, $telp, $email, $staff_id);

    if ($stmt->execute()) {
        echo "Data successfully updated!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Staff</title>
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

    <div class="container mt-5 w-50">
        <h1 class="mb-4">Form Edit Data Staff</h1>
        <form action="" method="POST" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input value="<?php echo htmlspecialchars($staff['nama']); ?>" type="text" id="nama" name="nama" class="form-control" required>
                <div class="invalid-feedback">
                    Silakan masukkan nama.
                </div>
            </div>

            <div class="mb-3">
                <label for="telp" class="form-label">No Telp</label>
                <input value="<?php echo htmlspecialchars($staff['telp']); ?>" type="text" id="telp" name="telp" class="form-control" required>
                <div class="invalid-feedback">
                    Silakan masukkan nomor telepon.
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input value="<?php echo htmlspecialchars($staff['email']); ?>" type="email" id="email" name="email" class="form-control" required>
                <div class="invalid-feedback">
                    Silakan masukkan email yang valid.
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">SUBMIT</button>
            <a href="./index.php" class="btn btn-secondary">Kembali ke Halaman Utama</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+6hh0+t/t3S4L+GmK3s63tCkEZe5D" crossorigin="anonymous"></script>
</body>
</html>
