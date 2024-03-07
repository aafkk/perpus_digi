<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 ">
        <h3 class="text-center">History Peminjaman Buku</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped hover cell-border" id="buku">
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
            $i = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM peminjaman INNER JOIN user on user.userid = peminjaman.userid INNER JOIN buku on buku.bukuid = peminjaman.bukuid");
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
              $i++;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  let table = new DataTable('#buku');
</script>