<div class="container-fluid py-4">
  <div class="row">
    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4 p-2">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total User</p>
                <h1 class="mt-1 mb-3">
                  <?php
                  $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM user");
                  $data = mysqli_fetch_array($query);
                  echo $data['total'];
                  ?>
                </h1>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-circle-08 text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4 p-2">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Buku</p>
                <h1 class="mt-1 mb-3">
                  <?php
                  $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM buku");
                  $data = mysqli_fetch_array($query);
                  echo $data['total'];
                  ?>
                </h1>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-books text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4 p-2">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Kategori Buku</p>
                <h1 class="mt-1 mb-3">
                  <?php
                  $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM kategoribuku");
                  $data = mysqli_fetch_array($query);
                  echo $data['total'];
                  ?>
                </h1>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-book-bookmark text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4 p-2">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Ulasan Buku</p>
                <h1 class="mt-1 mb-3">
                  <?php
                  $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM ulasanbuku");
                  $data = mysqli_fetch_array($query);
                  echo $data['total'];
                  ?>
                </h1>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-chat-round text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4 p-2">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Koleksi Pribadi</p>
                <h1 class="mt-1 mb-3">
                  <?php
                  $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM koleksipribadi");
                  $data = mysqli_fetch_array($query);
                  echo $data['total'];
                  ?>
                </h1>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-map-big text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4 p-2">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Peminjaman Buku</p>
                <h1 class="mt-1 mb-3">
                  <?php
                  $query = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM peminjaman");
                  $data = mysqli_fetch_array($query);
                  echo $data['total'];
                  ?>
                </h1>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-bullet-list-67 text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>