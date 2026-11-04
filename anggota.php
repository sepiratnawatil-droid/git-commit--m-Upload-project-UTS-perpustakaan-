
<?php
require_once 'function.php';

$keyword = $_GET['cari'] ?? '';
$dataAnggota = getAnggota($keyword);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container-fluid">
    <div class="row">

        <div class="col-md-2 bg-dark text-white min-vh-100 p-3">
            <h4>Perpustakaan</h4>
            <hr>
            <a href="index.php" class="text-white d-block mb-3">Dashboard</a>
            <a href="buku.php" class="text-white d-block mb-3">Manajemen Buku</a>
            <a href="anggota.php" class="text-white d-block mb-3">Manajemen Anggota</a>
        </div>

        <div class="col-md-10 p-4">
            <h2>Data mahasiswa</h2>
            <p>Kelola data anggota perpustakaan.</p>

            <form method="GET" class="d-flex mb-3">
                <input type="text" name="cari" class="form-control me-2"
                    placeholder="Cari nama, alamat, nomor HP, atau email..."
                    value="<?= htmlspecialchars($keyword); ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>

            <a href="tambah_anggota.php" class="btn btn-success mb-3">
                + Tambah Anggota
            </a>

                <div class="card shadow-sm">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php if (!empty($dataAnggota)): ?>
                                    <?php foreach ($dataAnggota as $anggota): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= htmlspecialchars($anggota['nama']); ?></td>
                                            <td><?= htmlspecialchars($anggota['alamat']); ?></td>
                                            <td><?= htmlspecialchars($anggota['no_hp']); ?></td>
                                            <td><?= htmlspecialchars($anggota['email']); ?></td>
                                            <td>
                                                <a href="edit_anggota.php?id=<?= $anggota['id_anggota']; ?>"
                                                    class="btn btn-warning btn-sm">Edit</a>

                                                <a href="hapus_anggota.php?id=<?= $anggota['id_anggota']; ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus anggota ini?')">
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            Belum ada data anggota.
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
