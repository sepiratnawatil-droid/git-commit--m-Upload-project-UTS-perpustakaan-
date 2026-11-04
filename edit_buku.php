
<?php
require_once 'function.php';

$id = $_GET['id'] ?? 0;

$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku = '$id'");
$buku = mysqli_fetch_assoc($query);

if (!$buku) {
    die("Data buku tidak ditemukan!");
}

$pesan = '';

if (isset($_POST['update'])) {
    if (editBuku($_POST)) {
        header("Location: buku.php");
        exit;
    } else {
        $pesan = "Data buku gagal diperbarui.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="mb-4">Edit Data Buku</h3>

        <?php if ($pesan): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($pesan); ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <input type="hidden" name="id_buku" value="<?= $buku['id_buku']; ?>">

            <div class="mb-3">
                <label class="form-label">Judul Buku</label>
                <input type="text" name="judul" class="form-control"
                    value="<?= htmlspecialchars($buku['judul']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Penulis</label>
                <input type="text" name="penulis" class="form-control"
                    value="<?= htmlspecialchars($buku['penulis']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Penerbit</label>
                <input type="text" name="penerbit" class="form-control"
                    value="<?= htmlspecialchars($buku['penerbit']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" class="form-control"
                    value="<?= htmlspecialchars($buku['tahun_terbit']); ?>"
                    min="1901" max="2155" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control"
                    value="<?= htmlspecialchars($buku['stok']); ?>"
                    min="0" required>
            </div>

            <button type="submit" name="update" class="btn btn-primary">
                Update
            </button>

            <a href="buku.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

</body>
</html>
