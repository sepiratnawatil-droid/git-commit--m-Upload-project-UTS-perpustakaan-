
<?php
require_once 'koneksi.php';

// ===============================
// FUNGSI MENAMPILKAN DATA BUKU
// ===============================
function getBuku($keyword = '') {
    global $koneksi;

    if ($keyword != '') {
        $sql = "SELECT * FROM buku
                WHERE judul LIKE ?
                OR penulis LIKE ?
                OR penerbit LIKE ?";

        $stmt = mysqli_prepare($koneksi, $sql);
        $cari = "%$keyword%";

        mysqli_stmt_bind_param($stmt, "sss", $cari, $cari, $cari);
        mysqli_stmt_execute($stmt);

        return mysqli_stmt_get_result($stmt);
    }

    return mysqli_query($koneksi, "SELECT * FROM buku ORDER BY id_buku DESC");
}

// ===============================
// FUNGSI MENAMBAH DATA BUKU
// ===============================
function tambahBuku($data) {
    global $koneksi;

    $sql = "INSERT INTO buku
            (judul, penulis, penerbit, tahun_terbit, stok)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($koneksi, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssssi",
        $data['judul'],
        $data['penulis'],
        $data['penerbit'],
        $data['tahun_terbit'],
        $data['stok']
    );

    return mysqli_stmt_execute($stmt);
}

// ===============================
// FUNGSI MENGEDIT DATA BUKU
// ===============================
function editBuku($data) {
    global $koneksi;

    $sql = "UPDATE buku SET
            judul = ?,
            penulis = ?,
            penerbit = ?,
            tahun_terbit = ?,
            stok = ?
            WHERE id_buku = ?";

    $stmt = mysqli_prepare($koneksi, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssssii",
        $data['judul'],
        $data['penulis'],
        $data['penerbit'],
        $data['tahun_terbit'],
        $data['stok'],
        $data['id_buku']
    );

    return mysqli_stmt_execute($stmt);
}

// ===============================
// FUNGSI MENGHAPUS DATA BUKU
// ===============================
function hapusBuku($id) {
    global $koneksi;

    $stmt = mysqli_prepare($koneksi, "DELETE FROM buku WHERE id_buku = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    return mysqli_stmt_execute($stmt);
}

// ===============================
// FUNGSI MENAMPILKAN DATA ANGGOTA
// ===============================
function getAnggota($keyword = '') {
    global $koneksi;

    if ($keyword != '') {
        $sql = "SELECT * FROM anggota
                WHERE nama LIKE ?
                OR alamat LIKE ?
                OR no_hp LIKE ?
                OR email LIKE ?";

        $stmt = mysqli_prepare($koneksi, $sql);
        $cari = "%$keyword%";

        mysqli_stmt_bind_param($stmt, "ssss", $cari, $cari, $cari, $cari);
        mysqli_stmt_execute($stmt);

        return mysqli_stmt_get_result($stmt);
    }

    return mysqli_query($koneksi, "SELECT * FROM anggota ORDER BY id_anggota DESC");
}

// ===============================
// FUNGSI MENAMBAH DATA ANGGOTA
// ===============================
function tambahAnggota($data) {
    global $koneksi;

    $sql = "INSERT INTO anggota
            (nama, alamat, no_hp, email)
            VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($koneksi, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssss",
        $data['nama'],
        $data['alamat'],
        $data['no_hp'],
        $data['email']
    );

    return mysqli_stmt_execute($stmt);
}

// ===============================
// FUNGSI MENGEDIT DATA ANGGOTA
// ===============================
function editAnggota($data) {
    global $koneksi;

    $sql = "UPDATE anggota SET
            nama = ?,
            alamat = ?,
            no_hp = ?,
            email = ?
            WHERE id_anggota = ?";

    $stmt = mysqli_prepare($koneksi, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssssi",
        $data['nama'],
        $data['alamat'],
        $data['no_hp'],
        $data['email'],
        $data['id_anggota']
    );

    return mysqli_stmt_execute($stmt);
}

// ===============================
// FUNGSI MENGHAPUS DATA ANGGOTA
// ===============================
function hapusAnggota($id) {
    global $koneksi;

    $stmt = mysqli_prepare($koneksi, "DELETE FROM anggota WHERE id_anggota = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    return mysqli_stmt_execute($stmt);
}
