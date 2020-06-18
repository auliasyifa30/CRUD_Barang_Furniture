<!-- pembungkus bagian form tabel -->
<section class="content">
  <div class="row">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Pengguna</h3>
      </div>
      
      <!-- button tambah -->
      <div class="box-body">
        <a href="?page=pengguna&aksi=tambah" class="btn btn-info" style="margin-bottom: 10px" title=""><i class="fa fa-plus"></i> Tambah</a>
        <table id="example1" class="table table-bordered table-striped">

        <!-- tabel yang akan dibuat -->
        <thead>
        <tr>
          <th>No</th>
          <th>Username</th>
          <th>Nama</th>
          <th>Password</th>
          <th>Level</th>
          <th>Foto</th>
          <th>Aksi</th>
        </tr>
        </thead>

        <tbody>
          <!-- mengambil query yang ada didatabase -->
          <?php
            $no = 1;
            $sql = $koneksi->query("select * from tb_user");
            while ($data = $sql->fetch_assoc())
            {
          ?>

          <!-- isi tabel yang telah dibuat -->
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $data['username']?></td>
            <td><?php echo $data['nama_user']?></td>
            <td><?php echo $data['password']?></td>
            <td><?php echo $data['level']?></td>
            <td><img src="assets/images/<?php echo $data['foto']?>" weight="75" height="75" ></td>

            <td>
              <!-- button ubah -->
              <a href="?page=pengguna&aksi=ubah&id_user=<?php echo $data['id_user']; ?>" class="btn btn-success" title=""><i class="fa fa-edit"> </i> Ubah</a>

              <!-- button hapus -->
              <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="?page=pengguna&aksi=hapus&id_user=<?php echo $data['id_user']; ?>" class="btn btn-danger" title=""><i class="fa fa-trash"> </i> Hapus</a>

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