
<?php
require_once 'function.php';

$pesan = '';

if (isset($_POST['simpan'])) {
    if (tambahAnggota($_POST)) {
        header("Location: anggota.php");
        exit;
    } else {
        $pesan = "Data anggota gagal disimpan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="mb-4">Tambah Data mahasiswa</h3>

        <?php if ($pesan): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($pesan); ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Nama Anggota</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Nomor HP</label>
                <input type="text" name="no_hp" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <button type="submit" name="simpan" class="btn btn-primary">
                Simpan
            </button>

            <a href="anggota.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

</body>
</html>
