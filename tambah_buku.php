
<?php
require_once 'function.php';

$pesan = '';

if (isset($_POST['simpan'])) {
    if (tambahBuku($_POST)) {
        header("Location: buku.php");
        exit;
    } else {
        $pesan = "Data buku gagal disimpan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="mb-4">Tambah Data Buku</h3>

        <?php if ($pesan): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($pesan); ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Judul Buku</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Penulis</label>
                <input type="text" name="penulis" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Penerbit</label>
                <input type="text" name="penerbit" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tahun Terbit</label>
                <input type="number" name="tahun_terbit"
                    class="form-control" min="1901" max="2155" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stok"
                    class="form-control" min="0" required>
            </div>

            <button type="submit" name="simpan" class="btn btn-primary">
                Simpan
            </button>

            <a href="buku.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

</body>
</html>
