<?php 

// nama host, Username, password dan nama database
$koneksi = mysqli_connect("localhost","penjamu_akreditasi","lpmppung2024","penjamu_akre");

// Periksa Koneksi
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>