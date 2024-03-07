<?php
include "../koneksi.php";

if (isset($_POST['kategorikan'])) {
    $id = $_POST['bukuid'];
    $nmkategori = $_POST['namakategori'];
    $query = mysqli_query($koneksi, "UPDATE kategoribuku set namakategori='$nmkategori' where kategoriid='$id'");

    $_SESSION['status'] = "Data di update";
    if ($query) {
        echo "<script>alert('data di update');location.href ='../index.php?page=buku';</script>";
    }
}
