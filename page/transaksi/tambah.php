<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Tambah Transaksi</h3>
      </div>

      <form method="POST">
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputPassword1">Tanggal Transaksi</label>
            <input type="date" class="form-control" name="tgl_transaksi">
          </div>

          <div class="form-group">
            <label>Nominal</label>
            <input type="text" class="form-control" name="nominal" >
          </div>

          <div class="form-group">
            <label>Catatan</label>
            <input type="text" class="form-control" name="catatan">
          </div>
          
          <!-- button tutup dan simpan -->
          <div class="box-footer">
            <a href="?page=transaksi" type="button" class="btn btn-primary">Tutup</a>
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>

      <!-- proses simpan tambah data -->
      <?php
        if (isset($_POST['simpan'])) {
          $tgl_transaksi = $_POST['tgl_transaksi'];
          $nominal = $_POST['nominal'];
          $catatan = $_POST['catatan'];

          $sql = $koneksi->query("insert into tb_transaksi (kode_user, tgl_transaksi, pengeluaran, catatan, keterangan)values('$id_user', '$tgl_transaksi', '$nominal', '$catatan', 'pengeluaran')");

          if($sql) {
            ?>
              <!-- akan menampilkan informasi jika berhasil menambah data -->
              <script type="text/javascript">
                alert ("Data berhasil ditambah !!");
                window.location.href="?page=transaksi";
              </script>
            <?php
          }
        }
      ?>