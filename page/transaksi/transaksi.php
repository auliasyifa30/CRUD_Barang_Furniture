<!-- pembungkus bagian form tabel -->
<section class="content">
  <div class="row">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Transaksi</h3>
      </div>

      <div class="box-body">
        <a href="?page=transaksi&aksi=tambah" class="btn btn-info" style="margin-bottom: 10px" title="">Tambah</a>
        <a target="blank" href="page/transaksi/cetak.php" class="btn btn-default" style="margin-bottom: 10px" title=""><i class="fa fa-print"></i> Cetak</a>
        <table id="example1" class="table table-bordered table-striped">

            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Transaksi</th>
                <th>Keterangan</th>
                <th>Catatan</th>
                <th>Kasir</th>
                <th>Pemasukan</th>
                <th>Pengeluaran</th>
              </tr>
            </thead>
                
            <tbody>
              <!-- mengambil query yang ada didatabase -->
              <?php
                $no = 1;
                $sql = $koneksi->query("select * from tb_transaksi, tb_user where tb_transaksi.kode_user=tb_user.id_user");
                while ($data = $sql->fetch_assoc()) {
              ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo date('d-F-Y', strtotime($data['tgl_transaksi'])); ?></td>
                    <td><?php echo $data['keterangan']?></td>
                    <td><?php echo $data['catatan']?></td>
                    <td><?php echo $data['nama_user']?></td>
                    <td><?php echo number_format($data['pemasukan'])?></td>
                    <td><?php echo number_format($data['pengeluaran'])?></td>
                  </tr>

                  <?php
                  // proses perhitungan untuk mendapatkan total pemasukan, total pengeluaran, dan saldo akhir
                  $masuk = $masuk+$data['pemasukan'];
                  $keluar = $keluar+$data['pengeluaran'];
                  $saldo = $masuk - $keluar;
                }
                  ?>
            </tbody>

            <tr>
              <th colspan="5" style="text-align: center">Total Pemasukan dan Pengeluaran</th>
              <td><?php echo number_format($masuk) ?></td>
              <td><?php echo number_format($keluar) ?></td>
            </tr>

            <tr>
              <th colspan="5" style="text-align: center">Saldo Akhir</th>
              <td><?php echo number_format($saldo) ?></td>
            </tr>

        </table>
      </div>
    </div>
  </div>
</section>