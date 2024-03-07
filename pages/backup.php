<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 ">
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped hover cell-border" id="buku">
          <thead class="text-center">
            <tr>
              <th>no</th>
              <th>nama user</th>
              <th>judul buku</th>
              <th>tanggal peminjaman</th>
              <th>status</th>
              <th>tanggal pengembalian</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php
            $i = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM peminjaman INNER JOIN user on user.userid = peminjaman.userid INNER JOIN buku on buku.bukuid = peminjaman.bukuid");
            while ($data = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['judul']; ?></td>
                <td><?php echo $data['tanggalpeminjaman']; ?></td>
                <td><span class="badge badge-sm bg-<?= ($data['statuspeminjaman'] == 'dipinjam' ? 'secondary' : 'info') ?>"><?php echo $data['statuspeminjaman'] ?></span></td>
                <td><?php
                    if ($data['tanggalpengembalian'] == '0000-00-00') {
                    ?>
                    <button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#edata<?php echo $data['peminjamanid'] ?>"><i class="ni ni-book-bookmark"></i></button>
                  <?php
                    } else {
                      echo $data['tanggalpengembalian'];
                    }
                  ?>
                </td>

              </tr>
              <!-- Modal tambah -->
              <div class="modal fade" id="edata<?php echo $data['peminjamanid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="col-12">
                        <div class="text-center">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Pengembalian</h1>
                        </div>
                      </div>
                    </div>
                    <form method="post" action="crud/pengembalian.php">
                    <input type="hidden" name="id" value="<?= $data['peminjamanid'] ?>">
                      <div class="modal-body">
                        <div class="row">
                          <div class="mb-3">
                            <label class="form-label">Tanggal Pengembalian</label>
                            <input type="date" name="tanggalpengembalian" class="form-control" >
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <div class="col-12">
                          <div class="text-center">
                            <input type="hidden" value="dikembalikan" name="statuspeminjaman">
                            <button type="submit" class="btn btn-success" name="pedit">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

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