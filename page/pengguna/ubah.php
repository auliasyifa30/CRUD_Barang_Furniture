<!-- proses koneksikan data yang telah ditambah ke database -->
<?php
  $id = $_GET['id_user'];
  $sql = $koneksi->query("select * from tb_user where id_user='$id'");
  $data = $sql->fetch_assoc();
?>

<div class="row">
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Ubah Data Pengguna</h3>
      </div>

      <form method="POST" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control"  name="username" value="<?php echo $data['username']; ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Nama</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_user']; ?>">
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Foto</label>
            <label><img src="assets/images/<?php echo $data['foto'] ?>" width="100" height="100" ></label>
          </div>

          <div class="form-group">
            <label>Ganti Foto</label>
            <input type="file" name="foto">
          </div>

          <!-- button tutup dan ubah -->
          <div class="box-footer">
            <a href="?page=pengguna" type="button" class="btn btn-primary">Tutup</a>
            <button type="submit" name="simpan" class="btn btn-primary">Ubah</button>
          </div>
        </form>
      </div>

      <!-- proses simpan tambah data -->
      <?php
        if (isset($_POST['simpan'])) {
          $username = $_POST['username'];
          $nama = $_POST['nama'];
          $password = $_POST['password'];
    
          $foto = $_FILES['foto']['name'];
          $lokasi = $_FILES['foto']['tmp_name'];
          //mengirimkan file dari komputer kita ke web server
          $upload = move_uploaded_file($lokasi, "assets/images/".$foto);

          // proses apabila mengganti foto
          if(!empty($lokasi)) {
            $sql = $koneksi->query("update tb_user set username='$username', nama_user='$nama', password='$password', foto='
                  $foto' where id_user='$id'");
            if($sql) {
              ?>
                <!-- akan menampilkan informasi jika berhasil menambah data -->
                <script type="text/javascript">
                  alert ("Data berhasil ditambah !!");
                  window.location.href="?page=pengguna";
                </script>

              <?php
            }
          }

          // apabila tidak mengganti foto
          else {
            $sql = $koneksi->query("update tb_user set username='$username', nama_user='$nama', password='$password' where 
                   id_user='$id'");
            if($sql) {
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