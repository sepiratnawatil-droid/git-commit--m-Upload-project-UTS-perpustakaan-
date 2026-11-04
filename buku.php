
<?php
require_once 'function.php';

$keyword = isset($_GET['cari']) ? trim($_GET['cari']) : '';
$dataBuku = getBuku($keyword);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajemen Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f4f6f9; }
        .sidebar { min-height: 100vh; background: #212529; }
        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 13px 20px;
        }
        .sidebar a:hover { background: #495057; }
        .content { padding: 30px; }
    </style>
</head>
<body>

<div class="container-fluid">
<div class="row">

    <div class="col-md-2 sidebar p-0">
        <h5 class="text-white text-center py-4">PERPUSTAKAAN</h5>
        <a href="index.php">Dashboard</a>
        <a href="buku.php">Rak Buku</a>
        <a href="anggota.php">Data mahasiswa </a>
    </div>

    <div class="col-md-10 content">
        <h3>Rak Buku</h3>
        <p>Kelola data buku perpustakaan.</p>

        <div class="card border-0 shadow-sm p-3 mt-4">
            <div class="d-flex flex-wrap justify-content-between gap-2 mb-3">
                <a href="tambah_buku.php" class="btn btn-primary">
                    + Tambah Buku
                </a>

                <form method="GET" class="d-flex gap-2">
                    <input type="text" name="cari"
                        class="form-control"
                        placeholder="Cari judul, penulis..."
                        value="<?= htmlspecialchars($keyword); ?>">
                    <button class="btn btn-success">Cari</button>
                    <a href="buku.php" class="btn btn-secondary">Reset</a>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if ($dataBuku && mysqli_num_rows($dataBuku) > 0): ?>
                        <?php $no = 1; ?>
                        <?php while ($buku = mysqli_fetch_assoc($dataBuku)): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($buku['judul']); ?></td>
                            <td><?= htmlspecialchars($buku['penulis']); ?></td>
                            <td><?= htmlspecialchars($buku['penerbit']); ?></td>
                            <td><?= htmlspecialchars($buku['tahun_terbit']); ?></td>
                            <td><?= htmlspecialchars($buku['stok']); ?></td>
                            <td>
                                <a href="edit_buku.php?id=<?= $buku['id_buku']; ?>"
                                   class="btn btn-warning btn-sm">Edit</a>
                                <a href="hapus_buku.php?id=<?= $buku['id_buku']; ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">
                                Data buku belum tersedia.
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</div>

</body>
</html>
