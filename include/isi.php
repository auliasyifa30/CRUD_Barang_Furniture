<?php
	// memanggil page yang telah diatur pada menu.php menggunakan GET
	$page = $_GET['page'];
	$aksi = $_GET['aksi'];

	// jika klik halaman pelanggan, maka akan diarahkan ke bagian pelanggan.php
	if($page == "pelanggan") {
		if($aksi == "") {
			include "page/pelanggan/pelanggan.php";
		}
		if($aksi == "tambah") {
			include "page/pelanggan/tambah.php";
		}
		if($aksi == "ubah") {
			include "page/pelanggan/ubah.php";
		}
		if($aksi == "hapus") {
			include "page/pelanggan/hapus.php";
		}
	}


	if($page == "pengguna") {
		if($aksi == "") {
			include "page/pengguna/pengguna.php";
		}
		if($aksi == "tambah") {
			include "page/pengguna/tambah.php";
		}
		if($aksi == "ubah") {
			include "page/pengguna/ubah.php";
		}
		if($aksi == "hapus") {
			include "page/pengguna/hapus.php";
		}
	}

	if($page == "laundry") {
		if($aksi == "") {
			include "page/laundry/laundry.php";
		}
		if($aksi == "tambah") {
			include "page/laundry/tambah.php";
		}
		if($aksi == "ubah") {
			include "page/laundry/ubah.php";
		}
		if($aksi == "lunas") {
			include "page/laundry/lunas.php";
		}
	}

	if($page == "transaksi") {
		if($aksi == "") {
			include "page/transaksi/transaksi.php";
		}
		if($aksi == "tambah") {
			include "page/transaksi/tambah.php";
		}
	}


	// jika mengklik selain yg ditentukan, maka akan kembali kehalaman home.php
	if($page == "") {
			include "home.php";
	}


?>