<?php
include "../koneksi.php";

if (isset($_POST['pedit'])) {
    $id = $_POST['id'];
    $tanggalpengembalian = $_POST['tanggalpengembalian'];
    $statuspeminjaman = $_POST['statuspeminjaman'];
    $query = mysqli_query($koneksi, "UPDATE peminjaman SET tanggalpengembalian='$tanggalpengembalian',statuspeminjaman='$statuspeminjaman' WHERE peminjamanid='$id'");

    if ($query) {
        $_SESSION['status'] = "Data Berhasil Ditambahkan";
        echo "<script>alert('Data Berhasil Ditambahkan');location.href ='../index.php?page=pengembalian ';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan');location.href ='../index.php?page=pengembalian ';</script>";
    }
     
}