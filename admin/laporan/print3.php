<?php 
include "../../inc/koneksi.php";
ob_start();
?>
<html>
<head>
	<title>Cetak PDF</title>
    <style type="text/css">
        table{
            width: 100%;
        }
    </style>
</head>
<body>
	<?php
	require_once("dompdf/autoload.inc.php");
	use Dompdf\Dompdf;
	$dompdf = new Dompdf();
        $query = "SELECT * FROM `tb_bukuhilang` LEFT JOIN tb_peminjaman on tb_bukuhilang.kd_peminjaman = tb_peminjaman.kd_peminjaman LEFT JOIN tb_anggota on tb_peminjaman.kd_anggota =  tb_anggota.NomorInduk LEFT JOIN tb_buku on tb_peminjaman.kd_buku = tb_buku.kd_buku"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
    ?>
    <table border="0">
        <tr>
            <td><img src="../../assets/img/logo.png" width="100"></td>
            <td>
                <center>
                <font size="4" style="font-weight: bold;color: black">PEMERINTAH KOTA ADMINISTRASI JAKARTA TIMUR</font><br>
                <font size="3" style="font-weight: bold;color: black">SMP NURUL IMAN</font><br>
                <font size="2" style="color: black">Jl. Pisangan Baru Timur No.4A, RT.4/RW.9, Pisangan Baru, Kec. Matraman, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13110</font>              
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="2"><hr></td>
        </tr>
    </table>
    <br />
    <h3 style="text-align: center;">Laporan Buku Hilang</h3>
    <br />
    <table>
    <tr>
           <th style="font-weight: bold;">NIS</th>
            <th style="font-weight: bold;">Nama Peminjam</th>
            <th style="font-weight: bold;">Judul</th>
            <th style="font-weight: bold;">Jumlah</th>
    </tr>
    <?php
    $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

    if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
        while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
             echo "<tr>";
            echo "<td>".$data['NomorInduk']."</td>";
            echo "<td>".$data['nama_anggota']."</td>";
            echo "<td>".$data['judul']."</td>";
            echo "<td>".$data['jumlahHilang']."</td>";
            echo "</tr>";
        }
    }else{ // Jika data tidak ada
        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
    }
    ?>
    </table>
    <br/>
    <p style="text-align: right;"><?php echo date('d-M-y'); ?></p>
    <p style="text-align: right;">Petugas Perpustakaan</p>
    <br/>
    <br/>
    <br/>
     <p style="text-align: right;">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )</p>
</body>
<?php
$html = ob_get_contents();
ob_end_clean();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4','landscape');
$dompdf->render();
$dompdf->stream('Data Buku Hilang.pdf');
?>
</html>

