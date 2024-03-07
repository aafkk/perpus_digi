<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0 ">
        <h3 class="text-center">Data Buku </h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped hover cell-border" id="dafbuku">
          <thead class="text-center">
            <tr>
              <th>judul</th>
              <th>Details</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php
            $i = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM buku");
            while ($data = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <td><?php echo $data['judul']; ?></td>
                <td>
                  <a href="#" class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#dbuku<?php echo $data['bukuid'] ?>"><i class=""></i>Detail</button>
                    <a href="#" class="btn btn-secondary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#ulasanm<?php echo $data['bukuid'] ?>"><i class=""></i>Ulasan</button>
                      <a href="?page=peminjamanuser&id=<?= $data['bukuid'] ?>" class="btn btn-info btn-sm">Peminjaman</a>
                </td>
              </tr>

              <!-- Modal Detail-->
              <div class="modal fade" id="dbuku<?php echo $data['bukuid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="col-12">
                        <big><a href="" data-bs-dismiss="modal"><i class="ni ni-fat-remove" style="float: right; color: red;"></i></a></big>
                        <div class="text-center">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Buku</h1>
                        </div>
                      </div>
                    </div>
                    <?php
                    $ibuku = $data['bukuid'];
                    $queryi = mysqli_query($koneksi, "SELECT * FROM kategoribuku_relasi INNER JOIN kategoribuku ON kategoribuku_relasi.kategoriid=kategoribuku.kategoriid WHERE bukuid ='$ibuku'");
                    $datai = mysqli_fetch_array($queryi);
                    ?>
                    <form method="post" action="crud/buku.php">
                      <input type="hidden" name="bukuid" value="<?= $data['bukuid'] ?>">
                      <div class="modal-body">
                        <div class="row">
                          <div class="mb-3">
                            <label class="form-label">judul</label>
                            <input type="text" name="judul" value="<?= $data['judul'] ?>" class="form-control" disabled>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">kategori</label>
                            <input type="text" name="kategori" value="<?= (empty($datai['namakategori']) ? '' : $datai['namakategori']) ?> " class="form-control" disabled>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">penulis</label>
                            <input type="text" name="penulis" value="<?= $data['penulis'] ?>" class="form-control" disabled>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">penerbit</label>
                            <input type="text" name="penerbit" value="<?= $data['penerbit'] ?>" class="form-control" disabled>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">tahun terbit</label>
                            <input type="text" name="tahunterbit" value="<?= $data['tahunterbit'] ?>" class="form-control" disabled>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">stok</label>
                            <input type="text" name="stok" value="<?= $data['stok'] ?>" class="form-control" disabled>
                          </div>

                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Akhir Modal Detail-->


              <!-- Modal Ulasan-->
              <div class="modal fade" id="ulasanm<?php echo $data['bukuid'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <div class="col-12">
                        <big><a href="" data-bs-dismiss="modal"><i class="ni ni-fat-remove" style="float: right; color: red;"></i></a></big>
                        <div class="text-center">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Ulasan Buku</h1>
                        </div>
                      </div>
                    </div>
                    <?php
                    $idbuku = $data['bukuid'];
                    $queryu = mysqli_query($koneksi, "SELECT * FROM ulasanbuku WHERE bukuid ='$idbuku'");
                    ?>
                    <form method="post" action="crud/ulasan.php">
                      <input type="hidden" name="bukuid" value="<?= $data['bukuid'] ?>">
                      <div class="modal-body">
                        <div class="row">
                          <div class="mb-3">
                            <label class="form-label">judul</label>
                            <input type="text" name="judul" value="<?= $data['judul'] ?>" class="form-control" disabled>
                          </div>
                          <?php while ($datau = mysqli_fetch_array($queryu)) { ?>
                            <div class="mb-3">
                              <label class="form-label">rating</label>
                              <input type="text" name="rating[]" value="<?= $datau['rating'] ?>" class="form-control" disabled>
                            </div>
                            <div class="mb-3">
                              <label class="form-label">ulasan</label>
                              <textarea class="form-control" name="ulasan[]" rows="5" disabled><?= $datau['ulasan'] ?></textarea>
                            </div>
                          <?php } ?>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Akhir Modal Ulasan-->



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
  let table = new DataTable('#dafbuku');
</script>