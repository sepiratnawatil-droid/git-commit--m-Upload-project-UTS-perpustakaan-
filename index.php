
<?php
require_once 'function.php';

$totalBuku = mysqli_fetch_assoc(
    mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM buku")
);

$totalAnggota = mysqli_fetch_assoc(
    mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM anggota")
);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Perpustakaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }
        .sidebar {
            min-height: 100vh;
            background: #212529;
        }
        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 13px 20px;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .content {
            padding: 30px;
        }
        .card {
            border: none;
            border-radius: 12px;
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-2 sidebar p-0">
            <h5 class="text-white text-center py-4">
                PERPUSTAKAAN
            </h5>

            <a href="index.php">Dashboard</a>
            <a href="buku.php">Rak Buku</a>
            <a href="anggota.php">Nama mahasiwa</a>
        </div>

        <div class="col-md-10 content">

            <h3>Dashboard Admin</h3>
            <p>Selamat datang di Sistem Informasi Perpustakaan.</p>

            <div class="row mt-4">

                <div class="col-md-6 mb-3">
                    <div class="card bg-primary text-white p-4">
                        <h5>Total Buku</h5>
                        <h2>
                            <?= $totalBuku['total']; ?>
                        </h2>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card bg-success text-white p-4">
                        <h5>Total Anggota</h5>
                        <h2>
                            <?= $totalAnggota['total']; ?>
                        </h2>
                    </div>
                </div>

            </div>

            <div class="card p-4 mt-3">
                <h5>Informasi Perpustakaan</h5>
                <p>
                    Sistem ini digunakan untuk mengelola data buku
                    dan anggota perpustakaan secara sederhana.
                </p>
            </div>

        </div>

    </div>
</div>

</body>
</html>
