<?php
include 'koneksi.php';
$username = isset($_GET['username']) ? $_GET['username'] : '';

$sql = "SELECT * FROM peminjaman 
        INNER JOIN user ON user.userid = peminjaman.userid 
        INNER JOIN buku ON buku.bukuid = peminjaman.bukuid";
if (!empty($username)) {
    $sql .= " WHERE user.username = '$username'";
}
$query = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h3 class="text-center">LAPORAN PEMINJAMAN PERPUS DIGI</h3>
        <br>
        <table class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>nama user</th>
                    <th>judul buku</th>
                    <th>tanggal peminjaman</th>
                    <th>tanggal pengembalian</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['judul']; ?></td>
                        <td><?php echo $data['tanggalpeminjaman']; ?></td>
                        <td><?= ($data['tanggalpengembalian'] == '0000-00-00') ? '-' : $data['tanggalpengembalian'] ?></td>
                        <td><span class="badge badge-sm bg-<?= ($data['statuspeminjaman'] == 'dipinjam' ? 'secondary' : 'info') ?>"><?php echo $data['statuspeminjaman'] ?></span></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<script type="text/javascript">
    window.print();
</script>