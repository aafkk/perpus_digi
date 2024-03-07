<?php
if (isset($_POST['peminjamanid'])) {
    $bukuid = $_POST['bukuid'];
    $userid = $_SESSION['user']['userid'];
    $rating = $_POST['rating'];
    $ulasan = $_POST['ulasan'];
    $statuspeminjaman = $_POST['statuspeminjaman'];

    $query = mysqli_query($koneksi, "INSERT INTO ulasanbuku (bukuid, userid, rating, ulasan ) VALUES  ('$bukuid', '$userid', '$rating', '$ulasan')");
     if ($query) {
       $queryi = mysqli_query($koneksi, "UPDATE peminjaman SET statuspeminjaman='$statuspeminjaman' WHERE bukuid='$bukuid' and userid='$userid'");

       if ($queryi) {
        echo '<script>alert("Peminjaman Terkonfirmasi")</script>';
    } else {
        echo '<script>alert("Peminjaman Gagal")</script>';
    }
     }
       
    }

?>




<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
               <h2 class="text-center">FORM PENGEMBALIAN</h2>
               <h5 class="text-center">Silahkan mengisi ulasan dan rating untuk mengembalikan</h5>
            </div>
            <div class="card-body">
                <form method="post">
                    <table class="table">
                        <tr>
                            <td width="200">Nama User</td>
                            <td width="1">:</td>
                            <td>
                           <input type="text" value="<?= $_SESSION['user']['username'] ?> " class="form-control" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td width="200">Judul Buku</td>
                            <td width="1">:</td>
                            <td>
                                <select name="bukuid" class="form-select" required onchange="setTanggalPeminjaman()">
                                    <option value="" hidden></option>
                                    <?php 
                                    $id = $_SESSION['user']['userid'];
                                    $f = mysqli_query($koneksi, "SELECT * FROM peminjaman INNER JOIN buku ON peminjaman.bukuid=buku.bukuid WHERE statuspeminjaman='dipinjam' and userid='$id'");
                                    while ($buku = mysqli_fetch_array($f)) {
                                    ?>
                                        <option data-tanggalpinjam="<?= $buku['tanggalpeminjaman'] ?>" data-tanggalkembali="<?= $buku['tanggalpengembalian'] ?>" value="<?php echo $buku['bukuid']; ?>"><?php echo $buku['judul']; ?></option>
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
                            <input type="date" class="form-control" id="tanggalpeminjaman" name="tanggalpeminjaman" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td width="200">Tanggal Pengembalian</td>
                            <td width="1">:</td>
                            <td>
                            <input type="date" class="form-control" id="tanggalpengembalian" name="tanggalpengembalian" disabled>
                            </td>
                        </tr>
                        <tr>
                          <td width="200">Rating</td>
                          <td width="1">:</td>
                          <td>
                              <select name="rating" class="form-select" required>
                                  <option value="" hidden></option>
                                  <option>1 star</option>
                                  <option>2 star</option>
                                  <option>3 star</option>
                                  <option>4 star</option>
                                  <option>5 star</option>
                              </select>
                          </td>
                        </tr>
                        <tr>
                          <td width="200">Ulasan</td>
                          <td width="1">:</td>
                          <td>
                            <textarea name="ulasan" id="ulasan" cols="105" rows="5"></textarea>
                          </td>
                        </tr>

                        <tr align="center">
                            <td colspan="3">
                                <input type="hidden" value="dikembalikan" name="statuspeminjaman">
                                <button type="submit" name="peminjamanid" class="btn btn-success"><i class="ni ni-send"></i></button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function setTanggalPeminjaman() {
        var select = document.getElementsByName("bukuid")[0];
        var selectedOption = select.options[select.selectedIndex];
        var tanggalPeminjaman = selectedOption.getAttribute("data-tanggalpinjam");
        var tanggalPengembalian = selectedOption.getAttribute("data-tanggalkembali");
        document.getElementById("tanggalpeminjaman").value = tanggalPeminjaman;
        document.getElementById("tanggalpengembalian").value = tanggalPengembalian;
    }
</script>