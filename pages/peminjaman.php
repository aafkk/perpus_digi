<?php

if (isset($_POST['peminjamanid'])) {
    $bukuid = $_POST['bukuid'];
    $userid = $_POST['userid'];
    $tanggalpeminjaman = $_POST['tanggalpeminjaman'];
    $tanggalpengembalian = $_POST['tanggalpengembalian'];
    $statuspeminjaman = $_POST['statuspeminjaman'];

    $query = mysqli_query($koneksi, "INSERT INTO peminjaman(bukuid,userid,tanggalpeminjaman,tanggalpengembalian,statuspeminjaman) values ('$bukuid','$userid','$tanggalpeminjaman','$tanggalpengembalian','$statuspeminjaman') ");

    if ($query) {
        echo '<script>alert("Peminjaman Terkonfirmasi")</script>';
    } else {
        echo '<script>alert("Peminjaman Gagal")</script>';
    }
}

?>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
               <h2 class="text-center">FORM PEMINJAMAN</h2>
               <h5 class="text-center">Silahkan isi data di bawah untuk meminjam buku</h5>
            </div>
            <div class="card-body">
                <form method="post">
                    <table class="table">
                        <tr>
                            <td width="200">Nama User</td>
                            <td width="1">:</td>
                            <td>
                            <select name="userid" class="form-select" required>
                                    <option value="" hidden></option>
                                    <?php
                                    $f = mysqli_query($koneksi, "SELECT * FROM user");
                                    while ($buku = mysqli_fetch_array($f)) {
                                    ?>
                                        <option value="<?php echo $buku['userid']; ?>"><?php echo $buku['username']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="200">Tanggal Peminjaman</td>
                            <td width="1">:</td>
                            <td>
                                <input type="date" class="form-control" name="tanggalpeminjaman" value="<?= date('Y-m-d') ?>" hidden>
                                <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td width="200">Judul Buku</td>
                            <td width="1">:</td>
                            <td>
                                <select name="bukuid" class="form-select" required>
                                    <option value="" hidden></option>
                                    <?php
                                    $f = mysqli_query($koneksi, "SELECT * FROM buku");
                                    while ($buku = mysqli_fetch_array($f)) {
                                    ?>
                                        <option value="<?php echo $buku['bukuid']; ?>"><?php echo $buku['judul']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="200">Tanggal Pengembalian</td>
                            <td width="1">:</td>
                            <td>
                                <input type="date" class="form-control" name="tanggalpengembalian" required>
                            </td>
                        </tr>

                        <tr align="center">
                            <td colspan="3">
                                <input type="hidden" value="dipinjam" name="statuspeminjaman">
                                <button type="submit" name="peminjamanid" class="btn btn-success"><i class="ni ni-send"></i></button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>