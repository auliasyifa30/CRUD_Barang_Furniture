<?php
	$kode = $_GET['id'];

	// menghapus data yang ada pada database berdasarkan kode_pelanggan
	$sql=$koneksi->query("delete from tb_pelanggan where kode_pelanggan='$kode' ");

	// pesan informasi 
	if($sql) {
		?>
			<script type="text/javascript">
		     	alert ("Data berhasil dihapus !!");
		        window.location.href="?page=pelanggan";
		    </script>

    	<?php
    }

?>