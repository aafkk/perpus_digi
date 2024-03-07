<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 ">
        <h3 class="text-center">Data Buku </h3>
      </div>
      <div class="card-body">
        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#tbuku"><i class="ni ni-fat-add"></i></button>
        <table class="table table-bordered table-striped hover cell-border" id="buku">
          <thead class="text-center">
            <tr>
              <th>judul</th>
              <th>kategori</th>
              <th>penulis</th>
              <th>penerbit</th>
              <th>tahun terbit</th>
              <th>stok buku</th>
              <th>aksi</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php
            $i = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM buku");
            while ($data = mysqli_fetch_array($query)) {
              $id = $data['bukuid'];
              $queryk = mysqli_query($koneksi, "SELECT * FROM kategoribuku_relasi INNER JOIN kategoribuku ON kategoribuku_relasi.kategoriid=kategoribuku.kategoriid WHERE bukuid='$id'");
              $datak = mysqli_fetch_array($queryk);
            ?>
              <tr>
                <td><?php echo $data['judul']; ?></td>
                <td>
                  <?php
                  if (!empty($datak['namakategori'])) {
                    echo $datak['namakategori'];
                  } else {
                    ?>
                    <button class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#kbuku<?php echo $data['bukuid'] ?>'><i class='ni ni-fat-add'></i></button>
                    <?php
                  }


                  ?>
                </td>
                <td><?php echo $data['penulis']; ?></td>
                <td><?php echo $data['penerbit']; ?></td>
                <td><?php echo $data['tahunterbit']; ?></td>
                <td><?php echo $data['stok']; ?></td>
                <td>
                  <a href="#" class="btn btn-secondary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#ebuku<?php echo $data['bukuid'] ?>"><i class="ni ni-ruler-pencil"></i></button>
                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hbuku<?php echo $data['bukuid'] ?>"><i class="ni ni-fat-delete"></i></button>
                </td>
              </tr>

              <!-- Modal Tambah Kategori-->
              <div class="modal fade" id="kbuku<?php echo $data['bukuid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="col-12">
                        <big><a href="" data-bs-dismiss="modal"><i class="ni ni-fat-remove" style="float: right; color: red;"></i></a></big>
                        <div class="text-center">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Buku</h1>
                        </div>
                      </div>
                    </div>
                    <form method="post" action="crud/buku.php">
                      <div class="modal-body">
                        <div class="row">
                          <div class="mb-3">
                            <label class="form-label">kategori buku</label>
                            <input type="text" name="id" value="<?php  echo $data['bukuid'] ?>" hidden>
                            <select name="kategoriid" class="form-select" >
                              <option value="" hidden>- Option -</option>
                              <?php
                              $query_tambah = mysqli_query($koneksi, "SELECT * FROM kategoribuku");
                              while ($tambahk = mysqli_fetch_array($query_tambah)) {
                              ?>
                                <option value="<?= $tambahk['kategoriid'] ?>"><?= $tambahk['namakategori'] ?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <div class="col-12">
                          <div class="text-center">
                            <button type="submit" class="btn btn-success" name="ztambah">Simpan</button>
                            <button type="reset" class="btn btn-dark">Reset</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Akhir Modal Tambah-->


              <!-- Modal Ubah-->
              <div class="modal fade" id="ebuku<?php echo $data['bukuid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="col-12">
                        <big><a href="" data-bs-dismiss="modal"><i class="ni ni-fat-remove" style="float: right; color: red;"></i></a></big>
                        <div class="text-center">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Buku</h1>
                        </div>
                      </div>
                    </div>
                    <form method="post" action="crud/buku.php">
                      <input type="hidden" name="bukuid" value="<?= $data['bukuid'] ?>">
                      <div class="modal-body">
                        <div class="row">
                          <div class="mb-3">
                            <label class="form-label">judul</label>
                            <input type="text" name="judul" value="<?= $data['judul'] ?>" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">kategori buku</label>
                            <input type="text" name="idb" value="<?php  echo $data['bukuid'] ?>" hidden>
                            <select name="kategoriid" class="form-select" required>
                              <option value="" hidden></option>
                              <?php
                              $query_ubah = mysqli_query($koneksi, "SELECT * FROM kategoribuku");
                              while ($ubahk = mysqli_fetch_array($query_ubah)) {
                              ?>
                                <option value="<?= $ubahk['kategoriid'] ?>"<?= (isset($datak['kategoriid']) && ($datak['kategoriid'] == $ubahk['kategoriid']) ? 'selected' : '') ?>><?= $ubahk['namakategori'] ?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">penulis</label>
                            <input type="text" name="penulis" value="<?= $data['penulis'] ?>" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">penerbit</label>
                            <input type="text" name="penerbit" value="<?= $data['penerbit'] ?>" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">tahun terbit</label>
                            <input type="text" name="tahunterbit" value="<?= $data['tahunterbit'] ?>" class="form-control" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">stok</label>
                            <input type="text" name="stok" value="<?= $data['stok'] ?>" class="form-control" required>
                          </div>

                        </div>
                      </div>
                      <div class="modal-footer">
                        <div class="col-12">
                          <div class="text-center">
                            <button type="submit" class="btn btn-success" name="eedit">Simpan</button>
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
              <div class="modal fade" id="hbuku<?php echo $data['bukuid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="col-12">
                        <div class="text-center">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Penghapusan data Buku</h1>
                        </div>
                      </div>
                    </div>
                    <form method="post" action="crud/buku.php">
                      <input type="hidden" name="bukuid" value="<?= $data['bukuid'] ?>">
                      <div class="modal-footer">
                        <div class="col-12">
                          <div class="text-center">
                            <button type="submit" class="btn btn-danger" name="ihapus">Hapus</button>
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
<div class="modal fade" id="tbuku" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="col-12">
          <big><a href="" data-bs-dismiss="modal"><i class="ni ni-fat-remove" style="float: right; color: red;"></i></a></big>
          <div class="text-center">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Buku</h1>
          </div>
        </div>
      </div>
      <form method="post" action="crud/buku.php">
        <div class="modal-body">
          <div class="row">
            <div class="mb-3">
              <label class="form-label">Judul</label>
              <input type="text" name="judul" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">kategori buku</label>
              <select name="kategoriid" class="form-select" >
                <option value="" hidden>- Option -</option>
                <?php
                $query_tambah = mysqli_query($koneksi, "SELECT * FROM kategoribuku");
                while ($tambahk = mysqli_fetch_array($query_tambah)) {
                ?>
                  <option value="<?= $tambahk['kategoriid'] ?>"><?= $tambahk['namakategori'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">penulis</label>
              <input type="text" name="penulis" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">penerbit</label>
              <input type="text" name="penerbit" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">tahaun terbit</label>
              <input type="text" name="tahunterbit" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">stok</label>
              <input type="text" name="stok" class="form-control" required>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <div class="col-12">
            <div class="text-center">
              <button type="submit" class="btn btn-success" name="etambah">Simpan</button>
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
  let table = new DataTable('#buku');
</script>