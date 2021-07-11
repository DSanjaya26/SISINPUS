<?php 
// Koneksi ke database.
include 'inc/koneksi.php';
// Deklarasi variable keyword buah.
$nis = $_GET['nis'];

//mengambil data
$query = mysqli_query($koneksi, "select * from tb_anggota where NomorInduk='$nis'");
$mahasiswa = mysqli_fetch_array($query);
$data = array(
            'nama'      =>  $mahasiswa['nama_anggota'],
        );

//tampil data
echo json_encode($data);
?>