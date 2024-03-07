<?php
include "../koneksi.php";

if(isset($_POST['ihapus'])) {
    $id = $_POST['bukuid'];
    $query = mysqli_query($koneksi, "DELETE FROM buku WHERE bukuid='$id' ");

    $_SESSION['status'] = "Data Barhasil Dihapus";
    if ($query) {
        echo "<script>alert('Data Berhasil Dihapus');location.href ='../index.php?page=buku ';</script>";
    }
}

if (isset($_POST['eedit'])) {
    $idb = $_POST['bukuid'];
    $id = $_POST['kategoriid'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahunterbit = $_POST['tahunterbit'];
    $stok = $_POST['stok'];
    $query = mysqli_query($koneksi, "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahunterbit='$tahunterbit', stok='$stok' WHERE bukuid='$id' ");

    $_SESSION['status'] = "Data di update";
    if ($query) {
        $queryu = mysqli_query($koneksi, "UPDATE kategoribuku_relasi SET kategoriid='$id' WHERE bukuid='$idb' ");

        if ($queryu) {
        echo "<script>alert('Data di update');location.href ='../index.php?page=buku';</script>";
        }
    }
}

if (isset($_POST['etambah'])) {
    $nk = $_POST['kategoriid'];
    $judul =$_POST['judul'];
    $penulis =$_POST['penulis'];
    $penerbit =$_POST['penerbit'];
    $th =$_POST['tahunterbit'];
    $stok =$_POST['stok'];
    $query = mysqli_query($koneksi, "INSERT INTO buku (judul,penulis,penerbit,tahunterbit,stok) VALUE ('$judul','$penulis','$penerbit','$th','$stok')");
    $_SESSION['status'] = "data di tambah";
    if ($query) {
        if ($_POST['kategoriid'] != '' || !empty($_POST['kategoriid'])) {
            $id = mysqli_insert_id($koneksi);
            $queryk = mysqli_query($koneksi, "INSERT INTO kategoribuku_relasi (bukuid,kategoriid) VALUE ('$id','$nk')");

            if ($queryk) {
                echo "<script>alert('data di tambah');location.href ='../index.php?page=buku';</script>";
                    
                }
        }else{
            echo "<script>alert('data di tambah');location.href ='../index.php?page=buku';</script>";
        }

     
    }
}

if (isset($_POST['ztambah'])) {
    $id = $_POST['id'];
    $kid = $_POST['kategoriid'];
    $query = mysqli_query($koneksi, "INSERT INTO kategoribuku_relasi (bukuid,kategoriid) VALUE ('$id','$kid')");

    $_SESSION['status'] = "Data kategori buku di tambah";
    if ($query) {
        echo "<script>alert('Data di update');location.href ='../index.php?page=buku';</script>";
    }
}