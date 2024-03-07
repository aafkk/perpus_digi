<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h3 class="text-center">Data Kategori Buku</h3>
      </div>
      <div class="card-body">
        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#tkategori"><i class="ni ni-fat-add"></i></button>
        <table class="table table-bordered table-striped hover cell-border" id="kategoribuku">
          <thead class="text-center">
            <tr>
              <th>no</th>
              <th>nama kategori buku</th>
              <th>aksi</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php
            $i = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM kategoribuku");
            while ($data = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $data['namakategori']; ?></td>
                <td>
                  <a href="#" class="btn btn-secondary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#ekategori<?php echo $data['kategoriid'] ?>"><i class="ni ni-ruler-pencil"></i></button>
                    <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hkategori<?php echo $data['kategoriid'] ?>"><i class="ni ni-fat-delete"></i></button>
                </td>
              </tr>

              <!-- Modal Ubah-->
              <div class="modal fade" id="ekategori<?php echo $data['kategoriid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="col-12">
                        <big><a href="" data-bs-dismiss="modal"><i class="ni ni-fat-remove" style="float: right; color: red;"></i></a></big>
                        <div class="text-center">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Kategori Buku</h1>
                        </div>
                      </div>
                    </div>
                    <form method="post" action="crud/kategori.php">
                      <input type="hidden" name="kategoriid" value="<?= $data['kategoriid'] ?>">
                      <div class="modal-body">
                        <div class="row">
                          <div class="mb-3">
                            <label class="form-label">nama kategori buku</label>
                            <input type="text" name="namakategori" value="<?= $data['namakategori'] ?>" class="form-control" required>
                          </div>

                        </div>
                      </div>
                      <div class="modal-footer">
                        <div class="col-12">
                          <div class="text-center">
                            <button type="submit" class="btn btn-success" name="bedit">Simpan</button>
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
              <div class="modal fade" id="hkategori<?php echo $data['kategoriid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="col-12">
                        <div class="text-center">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Penghapusan data Kategori Buku</h1>
                        </div>
                      </div>
                    </div>
                    <form method="post" action="crud/kategori.php">
                      <input type="hidden" name="kategoriid" value="<?= $data['kategoriid'] ?>">
                      <div class="modal-footer">
                        <div class="col-12">
                          <div class="text-center">
                            <button type="submit" class="btn btn-danger" name="khapus">Hapus</button>
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
<div class="modal fade" id="tkategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="col-12">
          <big><a href="" data-bs-dismiss="modal"><i class="ni ni-fat-remove" style="float: right; color: red;"></i></a></big>
          <div class="text-center">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Kategori Buku</h1>
          </div>
        </div>
      </div>
      <form method="post" action="crud/kategori.php">
        <input type="hidden" name="kategoriid" value="<?= $data['kategoriid'] ?>">
        <div class="modal-body">
          <div class="row">
            <div class="mb-3">
              <label class="form-label">nama kategori buku</label>
              <input type="text" name="namakategori" class="form-control" required>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <div class="col-12">
            <div class="text-center">
              <button type="submit" class="btn btn-success" name="btambah">Simpan</button>
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
  let table = new DataTable('#kategoribuku');
</script>