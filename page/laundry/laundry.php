<!-- pembungkus bagian form tabel -->
<section class="content">
  <div class="row">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Transaksi Laundry</h3>
    </div>

    <!-- button tambah -->
    <div class="box-body">
      <a href="?page=laundry&aksi=tambah" class="btn btn-info" style="margin-bottom: 10px" title=""><i class="fa fa-plus"> </i> Tambah</a>
      <table id="example1" class="table table-bordered table-striped">

      <!-- tabel yang ingin dibuat -->
      <thead>
        <tr>
          <th>No</th>
          <th>Pelanggan</th>
          <th>Tanggal Terima</th>
          <th>Tanggal Selesai</th>
          <th>Jumlah</th>
          <th>Catatan</th>
          <th>Status</th>
          <th>Kasir</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>

        <!-- mengambil query yang ada didatabase -->
        <?php
          $no = 1;
          $sql = $koneksi->query("select * from tb_laundry, tb_pelanggan, tb_user where 
                 tb_laundry.id_pelanggan=tb_pelanggan.kode_pelanggan and tb_laundry.kode_user=tb_user.id_user");
          while ($data = $sql->fetch_assoc())
          {
        ?>

            <tr>
              <!-- isian baris dari tabel yang telah dibuat -->
              <td><?php echo $no++ ?></td>
              <td><?php echo $data['nama']?></td>
              <td><?php echo date('d-F-Y', strtotime($data['tanggal_terima'])); ?></td>
              <td><?php echo date('d-F-Y', strtotime($data['tanggal_selesai'])); ?></td>
              <td><?php echo $data['nominal']?></td>
              <td><?php echo $data['catatan']?></td>
              <td><?php echo $data['status']?></td>
              <td><?php echo $data['nama_user']?></td>

              <!-- proses apabila status pembayaran belum lunas -->
              <?php 
                if ($data['status']=="Belum Lunas")
                {
              ?>

                <!-- button lunaskan -->
                <td style="float: left;">
                  <a href="?page=laundry&aksi=lunas&id=<?php echo $data['id_laundry']; ?>" class="btn btn-success" title=""><i class="fa fa-money"> </i> Lunaskan</a>
                </td>

              <?php
                }
              ?>

              <!-- button cetak -->
              <td style="float: right;">
                  <a target="blank" href="page/laundry/cetak.php?id=<?php echo $data['id_laundry']; ?>" class="btn btn-default" title=""><i class="fa fa-print"> </i> Cetak</a>
              </td>
            </tr>

          <?php
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>