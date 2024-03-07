<?php
include "../koneksi.php";

if(isset($_POST['shapus'])) {
    $id = $_POST['peminjamanid'];
    $query = mysqli_query($koneksi, "DELETE FROM peminjaman WHERE peminjamanid='$id' ");

    $_SESSION['status'] = "Data Barhasil Dihapus";
    if ($query) {
        echo "<script>alert('Data Berhasil Dihapus');location.href ='../index.php?page=historypeminjaman ';</script>";
    }
}
