<?php
  // menghubungkan pada bagian koneksi.php
  include "include/koneksi.php";
  // menghilangkan notice
  error_reporting(E_ALL ^ E_NOTICE); 
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Halaman Login</title>
    <!-- agar layout website yang dibuat fleksibel -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>

  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a><b>Laundry</b>APP</a>
      </div>
      
      <div class="login-box-body">
        <p class="login-box-msg">Halaman Login</p>
          <form method="post">

            <!-- input username -->
            <div class="form-group has-feedback">
              <input type="text" name="username" class="form-control" placeholder="Username">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <!-- input password -->
            <div class="form-group has-feedback">
              <input type="password" name="pass" class="form-control" placeholder="Password">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <!-- button login -->
            <div class="row">
              <div class="col-xs-4">
                <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Login</button>
              </div>
          </div>
        </form>
      </div>
    </div>

    <!-- jQuery 3 -->
    <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="assets/plugins/iCheck/icheck.min.js"></script>

    <!-- javascript pada bagian button login -->
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' /* optional */
        });
      });
    </script>
  </body>
</html>

<!-- proses apabila user mengklik tombol login, maka disesuaikan username dan password yg telah diinputkan -->
<?php
  if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $sql = $koneksi->query("select * from tb_user where username='$username' and password='$pass'");
    $data = $sql->fetch_assoc();

    // apabila datanya disesuai dengan database
    $ketemu = $sql->num_rows;

    // jika user yang login sesuai
    if ($ketemu >=1) {
      // untuk memulai eksekusi session pada server dan kemudian menyimpannya pada browser
      session_start();
      // apabila login sebagai admin
      if($data['level'] == "admin") {
          $_SESSION['admin'] = $data['id_user'];
          // redirect ke bagian index.php
          header("location:index.php");
      }
      else if($data['level'] == "kasir") {
          $_SESSION['kasir'] = $data['id_user'];
          // redirect ke bagian index.php
          header("location:index.php");
      }
    }
    // jika username dan password salah
    else {
      ?>
        <!-- pesan informasi -->
        <script type="text/javascript">
          alert("Login Gagal! Username dan Password salah...")
        </script>
      <?php
    }
  }
?>
