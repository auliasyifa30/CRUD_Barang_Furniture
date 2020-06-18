<!-- proses penjumlahan total laundry kiloan-->
<script>
  function sum() {
    var jumlah_kiloan = document.getElementById('jumlah_kiloan').value;
    var total = parseInt(jumlah_kiloan)*7000;

    if(!isNaN(total))
    {
      document.getElementById('nominal').value = total;
    }

  }
</script>


<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Tambah Data Laundry</h3>
      </div>
      <form method="POST">
        <div class="box-body">

          <!-- form pilih pelanggan -->
          <div class="form-group">
            <label>Pelanggan</label>
            <select class="form-control select2" style="width: 100%;" name="pelanggan" required="">
              <option value="">Pilih Pelanggan</option>
              <!-- mengambil data pelanggan yang telah diinput pada database -->
              <?php
                $sql = $koneksi->query("select * from tb_pelanggan");
                while ($data=$sql->fetch_assoc())
                {
                  echo "
                    <option value='$data[kode_pelanggan]'>$data[nama]</option>
                  ";
                }

              ?>
            </select>
          </div>

          <!-- form tanggal terima -->
          <div class="form-group">
            <label for="exampleInputPassword1">Tanggal Terima</label>
            <input type="date" class="form-control" name="tgl_terima">
          </div>

          <!-- form tanggal selesai -->
          <div class="form-group">
            <label for="exampleInputPassword1">Tanggal Selesai</label>
            <input type="date" class="form-control" name="tgl_selesai">
          </div>

          <!-- form jumlah kiloan -->
          <div class="form-group">
            <label>Jumlah Kiloan</label>
            <input type="text" onkeyup="sum();" id="jumlah_kiloan" class="form-control" name="jml_kiloan" required="">
          </div>

          <!-- form total, langsung keluar hasil karena telah dilakukan proses penjumlahan -->
          <div class="form-group">
            <label>Total</label>
            <input type="text" class="form-control" name="total" id="nominal" readonly="">
          </div>

          <!-- form catatan -->
          <div class="form-group">
            <label>Catatan</label>
            <input type="text" class="form-control" name="catatan">
          </div>
          
          <!-- form pilih status -->
          <div class="form-group">
            <label>Status</label>
            <select class="form-control select2" style="width: 100%;" name="status" required="">
              <option value="">Pilih Status</option>
              <option value="Lunas">Lunas</option>
              <option value="Belum Lunas">Belum Lunas</option>
            </select>
          </div>

          <!-- button tutup dan simpan -->
          <div class="box-footer">
            <a href="?page=laundry" type="button" class="btn btn-primary">Tutup</a>
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>

      <!-- proses simpan tambah data -->
      <?php
        if (isset($_POST['simpan'])) {
          $pelanggan = $_POST['pelanggan'];
          $tgl_terima = $_POST['tgl_terima'];
          $tgl_selesai = $_POST['tgl_selesai'];
          $jml_kiloan = $_POST['jml_kiloan'];
          $total = $_POST['total'];
          $status = $_POST['status'];
          $catatan = $_POST['catatan'];

          // (ssamakan dengan database) values (samakan dengan penamaan proses simpan)
          $sql = $koneksi->query("insert into tb_laundry (id_pelanggan, kode_user, tanggal_terima, tanggal_selesai, jumlah_kiloan, nominal, status, catatan)values('$pelanggan', '$id_user', '$tgl_terima', '$tgl_selesai', '$jml_kiloan', '$total', '$status', '$catatan')");

          if($sql) {
            ?>
            <!-- akan menampilkan informasi jika berhasil menambah data -->
              <script type="text/javascript">
                alert ("Data berhasil ditambah !!");
                window.location.href="?page=laundry";
              </script>

            <?php
          }

          if ($status="Lunas") {
             $sql = $koneksi->query("insert into tb_transaksi (kode_user, tgl_transaksi, pemasukan, catatan, keterangan)values('$id_user', $tgl_terima, '$total', '$catatan', 'pemasukan')");

            if($sql) {
              ?>
              <!-- akan menampilkan informasi jika berhasil menambah data -->
                <script type="text/javascript">
                  alert ("Data berhasil ditambah !!");
                  window.location.href="?page=laundry";
                </script>

              <?php
            }
          }
        }
      ?>