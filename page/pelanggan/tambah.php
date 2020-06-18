<!-- proses koneksikan data yang telah ditambah ke database -->
<?php
  $sql = $koneksi->query("select kode_pelanggan from tb_pelanggan order by kode_pelanggan desc");

  $data = $sql->fetch_assoc();

  // program membuat nomor urutan setelah PLG pada kode_pelanggan
  $kode_pelanggan = $data['kode_pelanggan'];
  // 4 adalah angka yang ingin diurutkan dibelakang kode_pelanggan 
  $urut = substr($kode_pelanggan, 4, 4);
  // urutannya bertambah 1
  $tambah = (int) $urut+1;

  if(strlen($tambah) == 1) {
    $format="PLG-"."000".$tambah;
  }
  elseif(strlen($tambah) == 2) {
    $format="PLG-"."00".$tambah;
  }
  elseif(strlen($tambah) == 3) {
    $format="PLG-"."0".$tambah;
  }
  else {
    $format="PLG-".$tambah;
  }
?>

<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Tambah Data Pelanggan</h3>
      </div>
     
      <form method="POST">
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Kode Pelanggan</label>
            <input type="text" class="form-control" value="<?php echo $format; ?>" name="kode">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Nama</label>
            <input type="text" class="form-control" name="nama">
          </div>

          <div class="form-group">
            <label>Alamat</label>
            <input class="form-control" rows="3" name="alamat">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">No Telepon</label>
            <input type="text" class="form-control" name="telepon">
          </div>
       
          <!-- button tutup dan simpan -->
          <div class="box-footer">
            <a href="?page=pelanggan" type="button" class="btn btn-primary">Tutup</a>
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>

    <!-- proses simpan tambah data -->
    <?php
      if (isset($_POST['simpan'])) {
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];

        // (samakan dengan database) values (samakan dengan penamaan proses simpan)
        $sql = $koneksi->query("insert into tb_pelanggan (kode_pelanggan, nama, alamat, telepon)values('$kode', '$nama', '$alamat', '$telepon')")

        ?>
          <!-- akan menampilkan informasi jika berhasil menambah data -->
          <script type="text/javascript">
            alert ("Data berhasil ditambah !!");
            window.location.href="?page=pelanggan";
          </script>

        <?php
      }
    ?>