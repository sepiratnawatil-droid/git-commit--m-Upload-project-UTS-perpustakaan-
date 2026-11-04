
<?php
require_once 'function.php';

$id = (int) ($_GET['id'] ?? 0);

$query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota = $id");
$anggota = mysqli_fetch_assoc($query);

if (!$anggota) {
    die("Data anggota tidak ditemukan!");
}

$pesan = '';

if (isset($_POST['update'])) {
    if (editAnggota($_POST)) {
        header("Location: anggota.php");
        exit;
    } else {
        $pesan = "Data anggota gagal diperbarui.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="mb-4">Edit Data Anggota</h3>

        <?php if ($pesan): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($pesan); ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <input type="hidden" name="id_anggota"
                value="<?= $anggota['id_anggota']; ?>">

            <div class="mb-3">
                <label class="form-label">Nama mahasiswa</label>
                <input type="text" name="nama" class="form-control"
                    value="<?= htmlspecialchars($anggota['nama']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" required><?= htmlspecialchars($anggota['alamat']); ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" name="no_hp" class="form-control"
                    value="<?= htmlspecialchars($anggota['no_hp']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control"
                    value="<?= htmlspecialchars($anggota['email']); ?>" required>
            </div>

            <button type="submit" name="update" class="btn btn-primary">
                Update
            </button>

            <a href="anggota.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

</body>
</html>
