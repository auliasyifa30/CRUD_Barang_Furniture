<!-- pembungkus bagian form tabel -->
<section class="content">
  <div class="row">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Pelanggan</h3>
      </div>
            
      <div class="box-body">
        <!-- button tambah -->
        <a href="?page=pelanggan&aksi=tambah" class="btn btn-info" style="margin-bottom: 10px" title=""><i class="fa fa-plus"></i> Tambah</a>
        <table id="example1" class="table table-bordered table-striped">

          <!-- tabel yang ingin dibuat -->
          <thead>
          <tr>
            <th>No</th>
            <th>Kode Pelanggan</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Aksi</th>
          </tr>
          </thead>

            <tbody>
              <!-- mengambil query yang ada didatabase -->
              <?php
                //urutan dimulai dari 1 
                $no = 1;
                // mengambil data dari database pada tabel pelanggan
                $sql = $koneksi->query("select * from tb_pelanggan");
                while ($data = $sql->fetch_assoc()) {
                  ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $data['kode_pelanggan']?></td>
                      <td><?php echo $data['nama']?></td>
                      <td><?php echo $data['alamat']?></td>
                      <td><?php echo $data['telepon']?></td>

                      <td>
                        <!-- button ubah -->
                        <a href="?page=pelanggan&aksi=ubah&id=<?php echo $data['kode_pelanggan']; ?>" class="btn btn-success" title=""><i class="fa fa-edit"></i> Ubah</a>

                        <!-- button hapus -->
                        <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="?page=pelanggan&aksi=hapus&id=<?php echo $data['kode_pelanggan']; ?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i> Hapus</a>
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