<!-- proses koneksikan data yang telah ditambah ke database -->
<?php
  $kode = $_GET['id'];
  $sql = $koneksi->query("select * from tb_pelanggan where kode_pelanggan='$kode'");
  $data = $sql->fetch_assoc();
?>

<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Ubah Data Pelanggan</h3>
      </div>

      <form method="POST">
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Kode Pelanggan</label>
            <input type="text" class="form-control" value="<?php echo $data['kode_pelanggan']; ?>" readonly name="kode">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Nama</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
          </div>

          <div class="form-group">
            <label>Alamat</label>
            <input class="form-control" rows="3" name="alamat" value="<?php echo $data['alamat']; ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">No Telepon</label>
            <input type="text" class="form-control" name="telepon" value="<?php echo $data['telepon']; ?>">
          </div>
        
        <!-- button ubah -->
        <div class="box-footer">
          <button type="submit" name="simpan" class="btn btn-primary">Ubah</button>
        </div>
      </form>
    </div>

    <!-- proses simpan ubah data -->
    <?php
      if (isset($_POST['simpan'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];

        // proses mengubah data untuk disimpan pada database
        $sql2 = $koneksi->query("update tb_pelanggan set nama='$nama', telepon='$telepon', alamat='$alamat' where kode_pelanggan='$kode'");
    ?>

    <!-- akan menampilkan informasi jika berhasil menambah data -->
    <script type="text/javascript">
      alert ("Data berhasil diubah !!");
      window.location.href="?page=pelanggan";
    </script>

    <?php
      }
    ?>