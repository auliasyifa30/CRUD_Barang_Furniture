<?php
	$id = $_GET['id_user'];
	$sql=$koneksi->query("delete from tb_user where id_user='$id' ");

	// pesan informasi 
	if($sql) {
		?>
			<script type="text/javascript">
		     	alert ("Data berhasil dihapus !!");
		        window.location.href="?page=pengguna";
		    </script>
    	<?php
    }
?>