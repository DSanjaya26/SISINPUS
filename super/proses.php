<?php 
include '../inc/koneksi.php';

// Tambah Petugas
if (isset($_POST['TambahPetugas'])) {
	$NI = $_POST['NI'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$jk = $_POST['JK'];
	$nomor = $_POST['nomor'];

	if ($NI != "" and $nama != "" and $alamat != ""  and $nomor != "") {

		$anggota = mysqli_query($koneksi, "INSERT INTO `tb_anggota` (`NomorInduk`, `nama_anggota`, `jk_anggota`, `alamat`, `no_telp`, `foto`, `status`) VALUES ('$NI', '$nama', '$jk', '$alamat', '$nomor', 'Default.png', 'Pegawai');");
		$login = mysqli_query($koneksi, "INSERT INTO `tb_login` (`username`, `password`, `akses`) VALUES ('$NI', MD5('$nomor'), 'admin');");
		    if ($anggota and $login) {
					header('location:admin.php?alert=berhasilinsert');
			}
			else{
					header('location:admin.php?alert=gagalinsert');
			}

	}else{
		header('location:insertadmin.php?alert=Null');
	}
}
// Update Petugas
elseif (isset($_POST['UpdatePetugas'])) {
	$ni = $_POST['NomorInduk'];
	$nama = $_POST['nama'];
	$pass = $_POST['pass1'];
	$alamat = $_POST['alamat'];
	$jk = $_POST['JK'];
	$nomor = $_POST['nomor'];

	if ($pass != "") {
		if ($ni != "" or $nama != "" or $alamat != "" or $nomor != "" or $pass != "") {
			$anggota = mysqli_query($koneksi, "UPDATE `tb_anggota` SET `nama_anggota` = '$nama', `jk_anggota` = '$jk', `alamat` = '$alamat', `no_telp` = '$nomor' WHERE `tb_anggota`.`NomorInduk` = '$ni';");
			$qry = mysqli_query($koneksi, "UPDATE `tb_login` SET `password` = MD5('$pass') WHERE `tb_login`.`username` = '$ni'");
		    if ($qry && $anggota) {
					header('location:admin.php?alert=berhasilupdate');
			}
			else{
					header('location:admin.php?alert=gagalupdate');
			}
		}else{
			header('location:admin.php?alert=gagalupdate');
		}
		
	}else{
		if ($ni != "" or $nama != "" or $alamat != "" or $nomor != "") {
		echo $pass;
			$anggota = mysqli_query($koneksi, "UPDATE `tb_anggota` SET `nama_anggota` = '$nama', `jk_anggota` = '$jk', `alamat` = '$alamat', `no_telp` = '$nomor' WHERE `tb_anggota`.`NomorInduk` = '$ni';");
		    if ($anggota) {
					header('location:admin.php?alert=berhasilupdate');
			}
			else{
					header('location:admin.php?alert=gagalupdate');
			}

		}else{
			header('location:admin.php?alert=gagalupdate');
		}
		
	}
}

elseif (isset($_POST['UpdatePass'])) {
	$ni = $_POST['nis'];
	$pw_old = $_POST['pw_old'];
	$pw_new = $_POST['pw_new'];
	$pw_new1 = $_POST['pw_new1'];

	if ($ni !="" and $pw_new == $pw_new1) {
	    $qry = mysqli_query($koneksi, "UPDATE `tb_login` SET `password` = MD5('$pw_new') WHERE `tb_login`.`username` = '$ni'");
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
}// Tambah Rak
elseif (isset($_POST['TambahRak'])) {
	$kode = $_POST['kode'];
	$nama = $_POST['nama'];

	if ($nama != "" and $kode != "") {
	    $qry = mysqli_query($koneksi, "INSERT INTO `tb_rak` (`kd_rak`, `nama_rak`) VALUES ('$kode', '$nama');");
	    if ($qry) {
				header('location:rak.php?alert=berhasilinsert');
		}
		else{
				header('location:rak.php?alert=gagalinsert');
		}
	}
	else {
	    header('location:insertrak.php?alert=Null');
	}
}
// Hapus Rak
elseif (isset($_GET['kd_rak'])) {
	$kd = $_GET['kd_rak'];
	$sql = mysqli_query ($koneksi,"DELETE FROM `tb_rak` WHERE `tb_rak`.`kd_rak` = '$kd'");
	if ($sql) {
		header('location:rak.php?alert=berhasildelete');
	}else{
		header('location:rak.php?alert=gagaldelete');
	}
}
// Tambah Kategori
elseif (isset($_POST['TambahKategori'])) {
	$nama = $_POST['nama'];

	if ($nama != "") {
	    $qry = mysqli_query($koneksi, "INSERT INTO `tb_kategori` (`kd_kategori`, `kategori`) VALUES (NULL, '$nama');");
	    if ($qry) {
				header('location:kategori.php?alert=berhasilinsert');
		}
		else{
				header('location:kategori.php?alert=gagalinsert');
		}
	}
	else {
	    header('location:insertkategori.php?alert=Null');
	}
}
// Hapus Kategori
elseif (isset($_GET['kd_kategori'])) {
	$kd = $_GET['kd_kategori'];
	$sql = mysqli_query ($koneksi,"DELETE FROM `tb_kategori` WHERE `tb_kategori`.`kd_kategori` = '$kd'");
	if ($sql) {
		header('location:kategori.php?alert=berhasildelete');
	}else{
		header('location:kategori.php?alert=gagaldelete');
	}
}
// Tambah Anggota
elseif (isset($_POST['TambahAnggota'])) {
	$NI = $_POST['NI'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$jk = $_POST['JK'];
	$nomor = $_POST['nomor'];
	$status = $_POST['status'];
	if ($NI != "" and $nama != "" and $alamat != ""  and $nomor != "") {
		$anggota = mysqli_query($koneksi, "INSERT INTO `tb_anggota` (`NomorInduk`, `nama_anggota`, `jk_anggota`, `alamat`, `no_telp`, `foto`, `status`) VALUES ('$NI', '$nama', '$jk', '$alamat', '$nomor', 'Default.png', '$status');");
		$login = mysqli_query($koneksi, "INSERT INTO `tb_login` (`username`, `password`, `akses`) VALUES ('$NI', MD5('$nomor'), 'anggota');");
		    if ($anggota and $login) {
					header('location:anggota.php?alert=berhasilinsert');
			}
			else{
					header('location:anggota.php?alert=gagalinsert');
			}
	}else{
		header('location:insertanggota.php?alert=Null');
	}
}
// Hapus Anggota
elseif (isset($_GET['NomorInduk'])) {
	$kd = $_GET['NomorInduk'];
	$sql = mysqli_query ($koneksi,"DELETE FROM `tb_anggota` WHERE `tb_anggota`.`NomorInduk` = '$kd'");
	if ($sql) {
		header('location:anggota.php?alert=berhasildelete');
	}else{
		header('location:anggota.php?alert=gagaldelete');
	}
}
// Update Anggota
elseif (isset($_POST['UpdateAnggota'])) {
	$nis = $_POST['NomorInduk'];
	$kd_datakelas = $_POST['kd_datakelas'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$jk = $_POST['JK'];
	$pass = $_POST['pass'];
	$nomor = $_POST['nomor'];
	$kls = $_POST['kelas'];
	if ($pass != "") {
		if ($NI != "" or $nama != "" or $alamat != "" or $nomor != "") {
					$anggota = mysqli_query($koneksi, "UPDATE `tb_anggota` SET `nama_anggota` = '$nama', `jk_anggota` = '$jk', `alamat` = '$alamat', `no_telp` = '$nomor' WHERE `tb_anggota`.`NomorInduk` = '$nis';");
					$qry = mysqli_query($koneksi, "UPDATE `tb_login` SET `password` = MD5('$pass') WHERE `tb_login`.`username` = '$nis'");
					    if ($anggota && $qry) {
								header('location:anggota.php?alert=berhasilupdate');
						}
						else{
								header('location:anggota.php?alert=gagalupdate');
						}

		}else{
			header('location:anggota.php?alert=gagalupdate');
		}
	}else{
		if ($NI != "" or $nama != "" or $alamat != "" or $nomor != "") {
			$anggota = mysqli_query($koneksi, "UPDATE `tb_anggota` SET `nama_anggota` = '$nama', `jk_anggota` = '$jk', `alamat` = '$alamat', `no_telp` = '$nomor' WHERE `tb_anggota`.`NomorInduk` = '$nis';");
			    if ($anggota) {
						header('location:anggota.php?alert=berhasilupdate');
				}
				else{
						header('location:anggota.php?alert=gagalupdate');
				}
		}else{
			header('location:anggota.php?alert=gagalupdate');
		}
	}
}
elseif (isset($_POST['UpdateProfil'])) {
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$nomor = $_POST['nomor'];
	if ($nis != "") {
	    $qry = mysqli_query($koneksi, "UPDATE `tb_anggota` SET `nama_anggota` = '$nama', `alamat` = '$alamat', `no_telp` = '$nomor' WHERE `tb_anggota`.`NomorInduk` = '$nis';");
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
}

?>