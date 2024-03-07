<?php
include "../koneksi.php";

if(isset($_POST['khapus'])) {
    $id = $_POST['kategoriid'];
    $query = mysqli_query($koneksi, "DELETE FROM kategoribuku WHERE kategoriid='$id' ");

    $_SESSION['status'] = "Data Barhasil Dihapus";
    if ($query) {
        echo "<script>alert('Data Berhasil Dihapus');location.href ='../index.php?page=kategoribuku';</script>";
    }
}

if (isset($_POST['bedit'])) {
    $id = $_POST['kategoriid'];
    $nmkategori = $_POST['namakategori'];
    $query = mysqli_query($koneksi, "UPDATE kategoribuku set namakategori='$nmkategori' where kategoriid='$id'");

    $_SESSION['status'] = "Data di update";
    if ($query) {
        echo "<script>alert('data di update');location.href ='../index.php?page=kategoribuku';</script>";
    }
}

if (isset($_POST['btambah'])) {
    $id = $_POST['kategoriid'];
    $nmkategori = $_POST['namakategori'];
    $query = mysqli_query($koneksi, "INSERT INTO kategoribuku(namakategori) VALUE('$nmkategori')");

    $_SESSION['status'] = "Data di tambah";
    if ($query) {
        echo "<script>alert('data di tambah');location.href ='../index.php?page=kategoribuku';</script>";
    }
}