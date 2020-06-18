<?php
	$id = $_GET['id'];

	// mengambil query yang ada pada database sesuai id 
	$sql = $koneksi->query("select * from tb_laundry where id_laundry='$id'");
	$data = $sql->fetch_assoc();

	$tanggal = $data['tanggal_terima'];
	$nominal = $data['nominal'];
	$catatan = $data['catatan'];

	$kode_user = $data['kode_user'];
	
	$sql2 = $koneksi->query("insert into tb_transaksi(kode_user, tgl_transaksi, pemasukan, catatan, keterangan)values('$kode_user', '$tanggal', '$nominal', '$catatan', 'pemasukan')");

	// jika mengklik button lunaskan, maka status pembayaran menjadi "Lunas"
	$sql2 = $koneksi->query("update tb_laundry set status='Lunas' where id_laundry = '$id'");

	if($sql2){
	    ?>
	    <!-- akan menampilkan informasi jika berhasil menambah data -->
	      <script type="text/javascript">
	        alert ("Data berhasil ditambah !!");
	        window.location.href="?page=laundry";
	      </script>

	    <?php
    }
?>