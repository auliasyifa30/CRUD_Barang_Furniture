<?php 
  // Mengatasi notice pada program
  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
  include "include/koneksi.php";

  // memulai eksekusi dan menyimpan data pada browser
  session_start();

  // kondisi bahwa user hanya dapat mengakses sistem setelah melakukan login
  if($_SESSION['admin'] || $_SESSION['kasir']) {
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LaundryApp</title>
    <!-- agar layout website yang dibuat fleksibel -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="assets/bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>

  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="index.php" class="logo">
          <span class="logo-lg"><b>Laundry</b>App</span>
        </a>
        
        <!-- navbar berwarna biru dibagian atas -->
        <nav class="navbar navbar-static-top">
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"></a>

        <!-- proses untuk menampilkan akses untuk user yang sedang login -->
        <?php
          if ($_SESSION['admin']) {
            $user = $_SESSION['admin'];
          }
          elseif($_SESSION['kasir']) {
            $user = $_SESSION['kasir'];
          }

          // mengambil data dari database berdasarkan id user
          $sql_user = $koneksi->query("select * from tb_user where id_user='$user'");
          $data_user = $sql_user->fetch_assoc();

          $nama = $data_user['nama_user'];
          $level = $data_user['level'];
          $id_user = $data_user['id_user'];
        ?>

        <!-- menu yang ada dibagian sebelah kanan atas -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="assets/images/<?php echo $data_user['foto'] ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $nama; ?></span>
              </a>

              <!-- menu yang ada setelah mengklik bagian kanan atas -->
              <ul class="dropdown-menu">
              <li class="user-header">
                <img src="assets/images/<?php echo $data_user['foto'] ?>" class="img-circle" alt="User Image">
                <p>
                  Anda Login sebagai
                  <br>
                  <?php echo $level; ?>
                </p>
              </li>
             
              <!-- menu yang ada setelah mengklik bagian kanan atas -->
              <li class="user-footer">
                <div style="text-align: center;">
                  <a href="logout.php" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- memanggil file menu.php -->
  <?php include "include/menu.php"; ?>

  <div class="content-wrapper">
    <section class="content-header">
      <!-- memanggil file isi.php -->
      <?php include "include/isi.php"; ?>
    </section>
  </div>

  <!-- menu footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a>Sistem Pengelolaan Laundry Kiloan Berbasis Web</a></strong> 
  </footer>

  <div class="control-sidebar-bg"></div>

  <!-- jQuery 3 -->
  <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.min.js"></script>
  <!-- Select2 -->
  <script src="assets/bower_components/select2/dist/js/select2.full.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="assets/dist/js/demo.js"></script>

  <!-- proses javascript untuk menu sidebar -->
  <script>
    $(document).ready(function () {
      $('.sidebar-menu').tree()
    })
  </script>

  <!-- proses javascript untuk menjalankan menu select2 -->
  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
      //Date range as a button
      $('#daterange-btn').daterangepicker(
        {
          ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate  : moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Date picker
      $('#datepicker').datepicker({
        autoclose: true
      })

      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
      })
      //Red color scheme for iCheck
      $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass   : 'iradio_minimal-red'
      })
      //Flat red color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass   : 'iradio_flat-green'
      })

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      //Timepicker
      $('.timepicker').timepicker({
        showInputs: false
      })
    })
  </script>

  <script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>
</body>
</html>

<!-- index.php dapat diakses apabila telah berhasil login -->
<?php
  }
  else
  {
    header("location:login.php");
  }
?>