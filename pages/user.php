<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h3 class="text-center">Data User</h3>
      </div>
      <div class="card-body">
        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#tuser"><i class="ni ni-fat-add"></i></button>
        <table class="table table-bordered table-striped hover cell-border" id="user">
          <thead class="text-center">
            <tr>
              <th>no</th>
              <th>username</th>
              <th>role</th>
              <th>email</th>
              <th>nama lengkap</th>
              <th>alamat</th>
              <th>aksi</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php
            $i = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM user");
            while ($data = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['role']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['namalengkap']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td>
                  <a href="#" class="btn btn-secondary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#euser<?php echo $data['userid'] ?>"><i class="ni ni-ruler-pencil"></i></button>
                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#huser<?php echo $data['userid'] ?>"><i class="ni ni-fat-delete"></i></button>
                </td>
              </tr>

              <!-- Modal Ubah-->
              <div class="modal fade" id="euser<?php echo $data['userid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="col-12">
                        <big><a href="crud/buku.php" data-bs-dismiss="modal"><i class="ni ni-fat-remove" style="float: right; color: red;"></i></a></big>
                        <div class="text-center">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data User</h1>
                        </div>
                      </div>
                    </div>
                    <form method="post" action="crud/user.php">
                      <input type="hidden" name="userid" value="<?= $data['userid'] ?>">
                      <div class="modal-body">
                        <div class="row">
                          <div class="mb-3">
                            <label class="form-label">username</label>
                            <input type="text" name="username" value="<?= $data['username'] ?>" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">role</label>
                            <select name="role" class="form-select" >
                              <option value="<?= $data['role'] ?>" hidden><?= $data['role'];?></option>
                              <option>petugas</option>
                              <option>anggota</option>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">password</label>
                            <input type="password" name="password" class="form-control" >
                          </div>
                          <div class="mb-3">
                            <label class="form-label">email</label>
                            <input type="text" name="email" value="<?= $data['email'] ?>" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">nama lengkap</label>
                            <input type="text" name="namalengkap" value="<?= $data['namalengkap'] ?>" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">alamat</label>
                            <input type="text" name="alamat" value="<?= $data['alamat'] ?>" class="form-control" required>
                          </div>

                        </div>
                      </div>
                      <div class="modal-footer">
                        <div class="col-12">
                          <div class="text-center">
                            <button type="submit" class="btn btn-success" name="iedit">Simpan</button>
                            <button type="reset" class="btn btn-dark">Reset</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Akhir Modal Ubah-->

              <!-- Modal Hapus-->
              <div class="modal fade" id="huser<?php echo $data['userid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="col-12">
                        <div class="text-center">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Penghapusan data User</h1>
                        </div>
                      </div>
                    </div>
                    <form method="post" action="crud/user.php">
                      <input type="hidden" name="userid" value="<?= $data['userid'] ?>">
                      <div class="modal-footer">
                        <div class="col-12">
                          <div class="text-center">
                            <button type="submit" class="btn btn-danger" name="phapus">Hapus</button>
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Batal</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Akhir Modal Hapus -->
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

<!-- Modal Tambah-->
<div class="modal fade" id="tuser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="col-12">
          <big><a href="" data-bs-dismiss="modal"><i class="ni ni-fat-remove" style="float: right; color: red;"></i></a></big>
          <div class="text-center">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data User</h1>
          </div>
        </div>
      </div>
      <form method="post" action="crud/user.php">
        <input type="hidden" name="userid" value="<?= $data['userid'] ?>">
        <div class="modal-body">
          <div class="row">
            <div class="mb-3">
              <label class="form-label">username</label>
              <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">role</label>
              <select name="role" class="form-select" required>
                <option value="" hidden>- option -</option>
                <option>petugas</option>
                <option>anggota</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">email</label>
              <input type="text" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">nama lengkap</label>
              <input type="text" name="namalengkap" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">alamat</label>
              <input type="text" name="alamat"  class="form-control" required>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <div class="col-12">
            <div class="text-center">
              <button type="submit" class="btn btn-success" name="itambah">Simpan</button>
              <button type="reset" class="btn btn-dark">Reset</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Akhir Modal Tambah-->

<script>
  let table = new DataTable('#user');
</script>