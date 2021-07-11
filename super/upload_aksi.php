<!-- import excel ke mysql -->
<!-- www.malasngoding.com -->

<?php 
// menghubungkan dengan koneksi
include '../inc/koneksi.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>

<?php
// upload file xls
$target = basename($_FILES['fileanggota']['name']) ;
move_uploaded_file($_FILES['fileanggota']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['fileanggota']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['fileanggota']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$nis     = $data->val($i, 1);
	$nama   = $data->val($i, 2);
	$jk  = $data->val($i, 3);
	$alamat  = $data->val($i, 4);
	$no  = $data->val($i, 5);
	$kls = $data->val($i,6);
	$status = $data->val($i,7);

	if($nama != "" && $alamat != "" && $no != ""){
		// input data ke database (table data_pegawai)
		$anggota = mysqli_query($koneksi, "INSERT INTO `tb_anggota` (`NomorInduk`, `nama_anggota`, `jk_anggota`, `alamat`, `no_telp`, `foto`, `status`) VALUES ('$nis', '$nama', '$jk', '$alamat', '0$no', 'Default.png', '$status');");
		$login = mysqli_query($koneksi, "INSERT INTO `tb_login` (`username`, `password`, `akses`) VALUES ('$nis', MD5('0$no'), 'anggota');");
		$kelas = mysqli_query($koneksi, "INSERT INTO `tb_datakelas` (`NomorAnggota`, `kd_kelas`) VALUES ('$nis', '$kls');");
		$berhasil++;
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filepegawai']['name']);

// alihkan halaman ke index.php
header("location:anggota.php?alert=berhasilinsert");
?>