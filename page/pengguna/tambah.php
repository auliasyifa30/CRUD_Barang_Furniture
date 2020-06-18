<div class="row">
  <!-- left column -->
  <div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Tambah Data Pengguna</h3>
      </div>
      <!-- /.box-header -->

      <form method="POST" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputP">Username</label>
            <input type="text" class="form-control"  name="username">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Nama</label>
            <input type="text" class="form-control" name="nama">
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
          </div>

          <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto">
          </div>

        <div class="box-footer">
          <a href="?page=pengguna" type="button" class="btn btn-primary">Tutup</a>
          <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>

  <!-- proses simpan tambah data -->
  <?php
    if (isset($_POST['simpan']))
    {
      $username = $_POST['username'];
      $nama = $_POST['nama'];
      $password = $_POST['password'];
      
      $foto = $_FILES['foto']['name'];
      $lokasi = $_FILES['foto']['tmp_name'];

      $upload = move_uploaded_file($lokasi, "assets/images/".$foto);

      if($upload)
      {
        // (ssamakan dengan database) values (samakan dengan penamaan proses simpan)
        $sql = $koneksi->query("insert into tb_user (username, nama_user, password, level, foto)values('$username', '$nama', '$password', 'kasir', '$foto')");
          if($sql)
          {
            ?>
              <!-- akan menampilkan informasi jika berhasil menambah data -->
              <script type="text/javascript">
                alert ("Data berhasil ditambah !!");
                window.location.href="?page=pengguna";
              </script>

            <?php
          }
      }
    }
  ?>