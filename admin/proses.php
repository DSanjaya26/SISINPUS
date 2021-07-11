<?php 
include '../inc/koneksi.php';
// Tambah Buku
if (isset($_POST['TambahBuku'])) {
	// ambil data file
	$namaCover = $_FILES['cover']['name'];
	$namaSementara = $_FILES['cover']['tmp_name'];
	// ambil data form
	$kodebuku = $_POST['kode'];
	$judul = $_POST['judul'];
	$pengarang = $_POST['pengarang'];
	$penerbit = $_POST['penerbit'];
	$isbn = $_POST['isbn'];
	$rak = $_POST['rak'];
	$kategori = $_POST['kategori'];
	$stok = $_POST['stok'];
	$tahun = $_POST['tahun'];
	if ($namaCover == "") {
		$namaCover = "Default-book.png";
	}
	if ($namaCover != "") {
		if ($judul != "" and $penerbit != "" and $pengarang != "" and $isbn != "" and $stok != "" and $tahun != "") {
			//Menentukan Lokasi Penyimpanan
			$dirUpload = "images/";
			//Proses Penyimpanan
			$save = move_uploaded_file($namaSementara, $dirUpload.$namaCover);
			$qry = mysqli_query($koneksi, "INSERT INTO `tb_buku` (`kd_buku`, `judul`, `pengarang`, `penerbit`, `isbn`, `kd_rak`, `kd_kategori`, `image`, `stok`, `tahun`) VALUES ('$kodebuku', '$judul', '$pengarang', '$penerbit', '$isbn', '$rak', '$kategori', '$namaCover', '$stok', '$tahun');");
			if($qry){
				header('location:buku.php?alert=berhasilinsert');
			}else{
				header('location:buku.php?alert=gagalinsert');
			}
		}else{
			header('location:insertbuku.php?alert=Null');
		}
	}
	
}
// Hapus Buku
elseif (isset($_GET['kd_buku'])) {
	$kd_buku = $_GET['kd_buku'];
	$sql = mysqli_query ($koneksi,"DELETE FROM `tb_buku` WHERE `tb_buku`.`kd_buku` = '$kd_buku'");
	if ($sql) {
		header('location:buku.php?alert=berhasildelete');
	}else{
		header('location:buku.php?alert=gagaldelete');
	}
}

// Update Buku
elseif (isset($_POST['UpdateBuku'])) {
	$namaCover = $_FILES['cover']['name'];
	$namaSementara = $_FILES['cover']['tmp_name'];
	$kd_buku = $_POST['kd_buku'];
	$judul = $_POST['judul'];
	$pengarang = $_POST['pengarang'];
	$penerbit = $_POST['penerbit'];
	$isbn = $_POST['isbn'];
	$rak = $_POST['rak'];
	$stok = $_POST['stok'];
	echo $namaCover;
	if ($namaCover == "") {
		if ($kd_buku != "") {
	    $qry = mysqli_query($koneksi, "UPDATE `tb_buku` SET `judul` = '$judul', `pengarang` = '$pengarang', `penerbit` = '$penerbit', `isbn` = '$isbn', `kd_rak` = '$rak', `stok` = '$stok' WHERE `tb_buku`.`kd_buku` = '$kd_buku'");
	    	if ($qry) {
				header('location:buku.php?alert=berhasilupdate');
			}
			else{
				header('location:buku.php?alert=gagalupdate');
			}
		}
		else {
	    header('location:buku.php?alert=gagalupdate');
		}
	}elseif($namaCover != ""){
		$dirUpload = "images/";
			//Proses Penyimpanan
		$save = move_uploaded_file($namaSementara, $dirUpload.$namaCover);
		if ($kd_buku != "") {
	    $qry = mysqli_query($koneksi, "UPDATE `tb_buku` SET `judul` = '$judul', `pengarang` = '$pengarang', `penerbit` = '$penerbit', `isbn` = '$isbn', `kd_rak` = '$rak', `stok` = '$stok', `image` = '$namaCover'  WHERE `tb_buku`.`kd_buku` = '$kd_buku'");
	    	if ($qry) {
				header('location:buku.php?alert=berhasilupdate');
			}
			else{
				header('location:buku.php?alert=gagalupdate');
			}
		}
		else {
	    header('location:buku.php?alert=gagalupdate');
		}
	}
	
}
// Tambah Peminjaman
elseif (isset($_POST['TambahPeminjaman'])) {
	$nis = $_POST['nis'];
	$kd_buku = $_POST['kd_buku'];
	$tgl_pinjam = $_POST['tgl_pinjam'];
	$tgl_kembali = $_POST['tgl_kembali'];
	$jmlh = $_POST['jmlh'];

	if($tgl_pinjam>$tgl_kembali){
		 header('location:peminjaman.php?alert=gagalinsert');
	}
	else{
		if ($nis) {
	    $qry = mysqli_query($koneksi, "INSERT INTO `tb_peminjaman` (`kd_anggota`, `kd_buku`, `jumlah`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES ('$nis', '$kd_buku', '$jmlh', '$tgl_pinjam', '$tgl_kembali', 'Dipinjam');");
		    if ($qry) {
					header('location:peminjaman.php?alert=berhasilinsert');
			}
			else{
					header('location:peminjaman.php?alert=gagalinsert');
			}
		}
		else {
		    header('location:peminjaman.php?alert=gagalinsert');
		}
	}
}
// Edit Peminjaman
elseif (isset($_POST['EditPeminjaman'])) {
	$kd = $_POST['kd_peminjaman'];
	$tgl = $_POST['tgl_kembali'];
	if ($kd) {
	    $qry = mysqli_query($koneksi, "UPDATE `tb_peminjaman` SET `tgl_kembali` = '$tgl' WHERE `tb_peminjaman`.`kd_peminjaman` = $kd;");
	    if ($qry) {
				header('location:peminjaman.php?alert=berhasilupdate');
		}
		else{
				header('location:peminjaman.php?alert=gagalupdate');
		}
	}
	else {
	    header('location:peminjaman.php?alert=gagalupdate');
	}
}
// Konfirmasi Buku Dikembalikan
elseif (isset($_GET['kd_peminjaman'])) {
	$kd = $_GET['kd_peminjaman'];
	$hasil = $koneksi->QUERY("SELECT * from tb_peminjaman where kd_peminjaman = $kd;");
	$rows = $hasil->fetch_All(MYSQLI_ASSOC);
	foreach ($rows as $row):
		$tgl_kembali = $row['tgl_kembali'];
	endforeach; 
	$awal  = date_create($tgl_kembali);
	$akhir = date_create(); // waktu sekarang
	$tgl_pengembalian = date('Y-m-d');
	$diff  = date_diff($awal, $akhir );
	$denda = ($diff->days)*1000;
	if ($kd) {
	    $qry = mysqli_query($koneksi, "UPDATE `tb_peminjaman` SET `tgl_pengembalian` = '$tgl_pengembalian', `status` = 'Dikembalikan', `denda` = '$denda' WHERE `tb_peminjaman`.`kd_peminjaman` = $kd;");
	    if ($qry) {
	    	echo '<script language="javascript">';
			echo 'alert("Siswa terkenda denda sebesar ';
			echo $denda;
			echo ' rupiah ")';
			echo '</script>';
			header("refresh:0;URL=history.php?alert=berhasilupdate'");
		}
		else{
				header('location:peminjaman.php?alert=gagalupdate2');
		}
	}
	else {
	    header('location:peminjaman.php?alert=gagalupdate2');
	}
}
//Update Profil
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
}
elseif (isset($_POST['UpdateFoto'])) {
	// ambil data file
	$namaFoto = $_FILES['foto']['name'];
	$namaSementara = $_FILES['foto']['tmp_name'];
	
	// ambil data form
	$user = $_POST['user'];
	if ($namaFoto == "") {
		$namaFoto = "Default.png";
	}
	$dirUpload = "images/";
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
}
elseif (isset($_POST['TambahHilang'])) {
	$kd = $_POST['kd_peminjaman'];
	$hilang = $_POST['jumlah'];
	$harga = $_POST['harga'];
	$hasil = $koneksi->QUERY("SELECT * from tb_peminjaman where kd_peminjaman = $kd;");
	$rows = $hasil->fetch_All(MYSQLI_ASSOC);
	foreach ($rows as $row):
		$tgl_kembali = $row['tgl_kembali'];
	endforeach; 
	$hasil = $koneksi->QUERY("SELECT * from tb_buku JOIN tb_peminjaman on tb_buku.kd_buku = tb_peminjaman.kd_buku where kd_peminjaman = $kd;");
	$rows = $hasil->fetch_All(MYSQLI_ASSOC);
	foreach ($rows as $row):
		$buku = $row['kd_buku'];
		$stok = $row['stok'];
		$jumlahpinjam = $row['jumlah'];
	endforeach; 
	$stoknew = $stok - $hilang;
	$awal  = date_create($tgl_kembali);
	$akhir = date_create(); // waktu sekarang
	$tgl_pengembalian = date('Y-m-d');
	$diff  = date_diff($awal, $akhir );
		if ($awal > $akhir){
	 $telat = 0;
	}else{
	    $telat = ($diff->days)*1000;
	}
	$jumlah = $hilang*$harga;
	$denda = $telat + $jumlah; 
	if ($jumlahpinjam < $hilang) {
		header('location:peminjaman.php?alert=jmlhbuku');
	}else{
		if ($kd) {
		    $qry = mysqli_query($koneksi, "UPDATE `tb_peminjaman` SET `tgl_pengembalian` = '$tgl_pengembalian', `status` = 'Dikembalikan', `denda` = '$denda' WHERE `tb_peminjaman`.`kd_peminjaman` = $kd;");
		    $qry1 = mysqli_query($koneksi, "INSERT INTO `tb_bukuhilang` (`kd_hilang`, `kd_peminjaman`, `jumlahHilang`) VALUES (NULL, '$kd', '$hilang');");
		    $qry2 = mysqli_query($koneksi, "UPDATE `tb_buku` SET `stok` = '$stoknew' WHERE `tb_buku`.`kd_buku` = '$buku';");
		    if ($qry1 && $qry && $qry2) {
		    	echo '<script language="javascript">';
				echo 'alert("Siswa terkenda denda sebesar ';
				echo $denda;
				echo ' rupiah ")';
				echo '</script>';
				header("refresh:0;URL=history.php?alert=berhasilupdate'");
			}
			else{
					header('location:peminjaman.php?alert=gagalupdate2');
			}
		}
		else {
		    header('location:peminjaman.php?alert=gagalupdate2');
		}
	}
}
elseif (isset($_POST['TambahNews'])) {
	// ambil data file
	$namaFoto = $_FILES['cover']['name'];
	$namaSementara = $_FILES['cover']['tmp_name'];
	
	// ambil data form
	$judul = $_POST['judul'];
	$isi = $_POST['isi'];
	$tgl = date('Y-m-d');
	if ($namaFoto == "") {
		$namaFoto = "news.png";
	}
	$dirUpload = "news/";
	//Proses Penyimpanan
	$save = move_uploaded_file($namaSementara, $dirUpload.$namaFoto);
	if ($save) {
		$qry = mysqli_query($koneksi, "INSERT INTO `tb_news` (`kd_news`, `judul`, `tgl`, `isi`, `foto`) VALUES (NULL, '$judul','$tgl', '$isi', '$namaFoto');");
		if($qry){
			header('location:news.php?alert=berhasilinsert');
		}else{
			header('location:news.php?alert=gagalinsert');
		}
	}else{
			header('location:news.php?alert=gagalinsert');
	}
}
elseif (isset($_POST['UpdateNews'])) {
	$namaCover = $_FILES['cover']['name'];
	$namaSementara = $_FILES['cover']['tmp_name'];
	$kd = $_POST['kd_news'];
	$judul = $_POST['judul'];
	$isi = $_POST['isi'];
	if ($namaCover == "") {
		if ($kd != "") {
	    $qry = mysqli_query($koneksi, "UPDATE `tb_news` SET `judul` = '$judul', `isi` = '$isi' WHERE `tb_news`.`kd_news` = $kd;");
	    	if ($qry) {
				header('location:news.php?alert=berhasilupdate');
			}
			else{
				header('location:news.php?alert=gagalupdate');
			}
		}
		else {
	    header('location:news.php?alert=gagalupdate');
		}
	}elseif($namaCover != ""){
		$dirUpload = "news/";
			//Proses Penyimpanan
		$save = move_uploaded_file($namaSementara, $dirUpload.$namaCover);
		if ($kd != "") {
	    $qry = mysqli_query($koneksi, "UPDATE `tb_news` SET `judul` = '$judul', `isi` = '$isi', `foto` = '$namaCover' WHERE `tb_news`.`kd_news` = $kd;");
	    	if ($qry) {
				header('location:news.php?alert=berhasilupdate');
			}
			else{
				header('location:news.php?alert=gagalupdate');
			}
		}
		else {
	    header('location:news.php?alert=gagalupdate');
		}
	}	
}
elseif (isset($_GET['kd_news'])) {
	$kd = $_GET['kd_news'];
	$sql = mysqli_query ($koneksi,"DELETE FROM `tb_news` WHERE `tb_news`.`kd_news` = '$kd'");
	if ($sql) {
		header('location:news.php?alert=berhasildelete');
	}else{
		header('location:news.php?alert=gagaldelete');
	}
}
?>