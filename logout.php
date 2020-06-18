<?php
	//memulai eksekusi session dan menyimpan data pada web browser  
	session_start();

	// menghapus semua data session yang ada
	session_destroy();

	// diarahkan kehalaman login.php
	header("location:login.php");
?>