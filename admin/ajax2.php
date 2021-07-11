<?php 
// Koneksi ke database.
include '../inc/koneksi.php';
// Deklarasi variable keyword buah.
$kd_buku = $_GET['kd_buku'];

//mengambil data
$query = mysqli_query($koneksi, "select * from tb_buku where kd_buku='$kd_buku'");
$buku = mysqli_fetch_array($query);
$data = array(
            'judul'      =>  $buku['judul'],
        );

//tampil data
echo json_encode($data);
?>