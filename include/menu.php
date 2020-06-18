<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="assets/images/<?php echo $data_user['foto'] ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $nama; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- awal menu sidebar-->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <!-- jika user sebagai admin, maka admin dapat mengakses seluruh menu -->
          <!-- jika user sebagai kasir, maka menu yang akan ditampilkan adalah dashboard, pelanggan, dan transaksi laundry -->
          <?php  if($_SESSION['admin']) { ?>
         <li><a href="?page=pengguna"><i class="fa fa-dashboard"></i> Pengguna</a></li>
         <?php } ?>
         <li><a href="?page=pelanggan"><i class="fa fa-dashboard"></i> Pelanggan</a></li>
         <li><a href="?page=laundry"><i class="fa fa-dashboard"></i> Transaksi Laundry</a></li>
         <?php  if($_SESSION['admin']) { ?>
         <li><a href="?page=transaksi"><i class="fa fa-money"></i> Transaksi</a></li>
         <?php } ?>
      </li>
    </ul>
  </section>
  <!-- akhir menu sidebar -->

</aside>


