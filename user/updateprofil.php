<?php 
include '../inc/koneksi.php';
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$nomor = $_POST['nomor'];
	if ($nis != "") {
	    $qry = mysqli_query($koneksi, "UPDATE `tb_anggota` SET `nama_anggota` = '$nama',`alamat` = '$alamat', `no_telp` = '$nomor' WHERE `tb_anggota`.`NomorInduk` = '$nis';");
	    if ($qry) {
				header('location:profile.php?alert=berhasilupdate');
		}
		else{
				header('location:profile.php?alert=gagalupdate');
		}
	}
	else {
	    header('location:profile.php?alert=gagalupdate');
	}
 ?>