
<?php
require_once 'function.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    if (hapusBuku($id)) {
        header("Location: buku.php");
        exit;
    } else {
        echo "Data buku gagal dihapus.";
    }
} else {
    header("Location: buku.php");
    exit;
}
?>
