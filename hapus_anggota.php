
<?php
require_once 'function.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    if (hapusAnggota($id)) {
        header("Location: anggota.php");
        exit;
    } else {
        echo "Data anggota gagal dihapus.";
    }
} else {
    header("Location: anggota.php");
    exit;
}
?>
