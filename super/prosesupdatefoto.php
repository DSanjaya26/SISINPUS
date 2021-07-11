<?php 
include '../inc/koneksi.php';
    $namaFoto = $_FILES['foto']['name'];
	$namaSementara = $_FILES['foto']['tmp_name'];
	
	// ambil data form
	$user = $_POST['user'];
	if ($namaFoto == "") {
		$namaFoto = "Default.png";
	}
	$dirUpload = "../admin/images/";
	//Proses Penyimpanan
	$save = move_uploaded_file($namaSementara, $dirUpload.$namaFoto);
	if ($user != "") {
		$qry = mysqli_query($koneksi, "UPDATE `tb_anggota` SET `foto` = '$namaFoto' WHERE `tb_anggota`.`NomorInduk` = '$user';");
		if($qry){
			header('location:profile.php?alert=berhasilupdate');
		}else{
			header('location:profile.php?alert=gagalupdate');
		}
	}else{
			header('location:profile.php?alert=gagalupdate');
	}
 ?>