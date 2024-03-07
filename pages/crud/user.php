<?php
include "../koneksi.php";

if(isset($_POST['phapus'])) {
    $id = $_POST['userid'];
    $query = mysqli_query($koneksi, "DELETE FROM user WHERE userid='$id' ");

    $_SESSION['status'] = "Data Barhasil Dihapus";
    if ($query) {
        echo "<script>alert('Data Berhasil Dihapus');location.href ='../index.php?page=user ';</script>";
    }
}

if (isset($_POST['iedit'])) {
    $id = $_POST['userid'];
    $usernm = $_POST['username'];
    $role = $_POST['role'];
    $pw = md5($_POST['password']);
    $email = $_POST['email'];
    $nm = $_POST['namalengkap'];
    $alamat = $_POST['alamat'];

    if ($_POST['password'] == '' ) {
        $query = mysqli_query($koneksi, "UPDATE user set username='$usernm', role='$role' , email='$email', namalengkap='$nm', alamat='$alamat' where userid='$id' ");
    }else{
        $query = mysqli_query($koneksi, "UPDATE user set username='$usernm', role='$role' , password='$pw', email='$email', namalengkap='$nm', alamat='$alamat' where userid='$id' ");
    }


    $_SESSION['status'] = "data di update";
    if ($query) {
        echo "<script>alert('data di update');location.href ='../index.php?page=user';</script>";
    }
}

if (isset($_POST['itambah'])) {
    $id = $_POST['userid'];
    $usernm = $_POST['username'];
    $role = $_POST['role'];
    $pw = md5($_POST['password']);
    $email = $_POST['email'];
    $nm = $_POST['namalengkap'];
    $alamat = $_POST['alamat'];
    $query = mysqli_query($koneksi, "INSERT INTO user (username,role,password,email,namalengkap,alamat) VALUE ('$usernm','$role','$pw','$email','$nm','$alamat')");

    $_SESSION['status'] = "data di tambah";
    if ($query) {
        echo "<script>alert('data di tambah');location.href='../index.php?page=user';</script>";   
     }
    
}