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
    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
        $filter = $_GET['filter']; // Ambil data filder yang dipilih user

        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
            $tgl1 = date('d-m-y', strtotime($_GET['tanggal1']));
            $tgl2 = date('d-m-y', strtotime($_GET['tanggal2']));
            $query = "SELECT * FROM `tb_peminjaman` JOIN tb_buku on tb_peminjaman.kd_buku = tb_buku.kd_buku JOIN tb_anggota on tb_peminjaman.kd_anggota = tb_anggota.NomorInduk WHERE tb_peminjaman.tgl_pinjam BETWEEN '".$_GET['tanggal1']."' AND '".$_GET['tanggal2']."' and tb_peminjaman.status ='Dikembalikan'";
            $query1 = "SELECT sum(tb_peminjaman.denda) as total FROM `tb_peminjaman` JOIN tb_buku on tb_peminjaman.kd_buku = tb_buku.kd_buku JOIN tb_anggota on tb_peminjaman.kd_anggota = tb_anggota.NomorInduk WHERE tb_peminjaman.tgl_pinjam BETWEEN '".$_GET['tanggal1']."' AND '".$_GET['tanggal2']."' and tb_peminjaman.status ='Dikembalikan'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
            $query2 = "SELECT sum(tb_peminjaman.jumlah) as total FROM `tb_peminjaman` JOIN tb_buku on tb_peminjaman.kd_buku = tb_buku.kd_buku JOIN tb_anggota on tb_peminjaman.kd_anggota = tb_anggota.NomorInduk WHERE tb_peminjaman.tgl_pinjam BETWEEN '".$_GET['tanggal1']."' AND '".$_GET['tanggal2']."' and tb_peminjaman.status ='Dikembalikan'";
        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

            $query = "SELECT * FROM `tb_peminjaman` JOIN tb_buku on tb_peminjaman.kd_buku = tb_buku.kd_buku JOIN tb_anggota on tb_peminjaman.kd_anggota = tb_anggota.NomorInduk WHERE MONTH(tgl_pinjam)='".$_GET['bulan']."' AND YEAR(tgl_pinjam)='".$_GET['tahun']."' and tb_peminjaman.status ='Dikembalikan'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
            $query1 = "SELECT sum(tb_peminjaman.denda) as total FROM `tb_peminjaman` JOIN tb_buku on tb_peminjaman.kd_buku = tb_buku.kd_buku JOIN tb_anggota on tb_peminjaman.kd_anggota = tb_anggota.NomorInduk WHERE MONTH(tgl_pinjam)='".$_GET['bulan']."' AND YEAR(tgl_pinjam)='".$_GET['tahun']."' and tb_peminjaman.status ='Dikembalikan'";
            $query2 = "SELECT sum(tb_peminjaman.jumlah) as total FROM `tb_peminjaman` JOIN tb_buku on tb_peminjaman.kd_buku = tb_buku.kd_buku JOIN tb_anggota on tb_peminjaman.kd_anggota = tb_anggota.NomorInduk WHERE MONTH(tgl_pinjam)='".$_GET['bulan']."' AND YEAR(tgl_pinjam)='".$_GET['tahun']."' and tb_peminjaman.status ='Dikembalikan'";
        }else{ // Jika filter nya 3 (per tahun)
           
            $query = "SELECT * FROM `tb_peminjaman` JOIN tb_buku on tb_peminjaman.kd_buku = tb_buku.kd_buku JOIN tb_anggota on tb_peminjaman.kd_anggota = tb_anggota.NomorInduk WHERE YEAR(tgl_pinjam)='".$_GET['tahun']."' and tb_peminjaman.status ='Dikembalikan'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
            $query1 = "SELECT sum(tb_peminjaman.denda) as total FROM `tb_peminjaman` JOIN tb_buku on tb_peminjaman.kd_buku = tb_buku.kd_buku JOIN tb_anggota on tb_peminjaman.kd_anggota = tb_anggota.NomorInduk WHERE YEAR(tgl_pinjam)='".$_GET['tahun']."' and tb_peminjaman.status ='Dikembalikan'";
            $query2 = "SELECT sum(tb_peminjaman.jumlah) as total FROM `tb_peminjaman` JOIN tb_buku on tb_peminjaman.kd_buku = tb_buku.kd_buku JOIN tb_anggota on tb_peminjaman.kd_anggota = tb_anggota.NomorInduk WHERE YEAR(tgl_pinjam)='".$_GET['tahun']."' and tb_peminjaman.status ='Dikembalikan'";
        }
    }else{ // Jika user tidak mengklik tombol tampilkan
        $query = "SELECT * FROM `tb_peminjaman` JOIN tb_buku on tb_peminjaman.kd_buku = tb_buku.kd_buku JOIN tb_anggota on tb_peminjaman.kd_anggota = tb_anggota.NomorInduk WHERE tb_peminjaman.status ='Dikembalikan'"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
        $query1 = "SELECT sum(tb_peminjaman.denda) as total FROM `tb_peminjaman` JOIN tb_buku on tb_peminjaman.kd_buku = tb_buku.kd_buku JOIN tb_anggota on tb_peminjaman.kd_anggota = tb_anggota.NomorInduk WHERE tb_peminjaman.status ='Dikembalikan'";
        $query2 = "SELECT sum(tb_peminjaman.jumlah) as total FROM `tb_peminjaman` JOIN tb_buku on tb_peminjaman.kd_buku = tb_buku.kd_buku JOIN tb_anggota on tb_peminjaman.kd_anggota = tb_anggota.NomorInduk WHERE tb_peminjaman.status ='Dikembalikan'";
    }
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
    <h3 style="text-align: center;">Laporan Transaksi Peminjaman</h3>
    <br />
    <table border="0">
    <tr>
            <th style="font-weight: bold;">Nama</th>
            <th style="font-weight: bold;">Judul</th>
            <th style="font-weight: bold;">Jumlah</th>
            <th style="font-weight: bold;">Tanggal Pinjam</th>
            <th style="font-weight: bold;">Tanggal Kembali</th>
            <th style="font-weight: bold;">Tanggal Pengembalian</th>
            <th style="font-weight: bold;">Denda</th>
            <th style="font-weight: bold;">Status</th>
    </tr>

    <?php
    $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
    $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
    if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
        while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
            echo "<tr>";
            echo "<td>".$data['nama_anggota']."</td>";
            echo "<td>".$data['judul']."</td>";
            echo "<td>".$data['jumlah']."</td>";
            echo "<td>".$data['tgl_pinjam']."</td>";
            echo "<td>".$data['tgl_kembali']."</td>";
            echo "<td>".$data['tgl_pengembalian']."</td>";
                $stok = $data['denda'];
                if ($stok < 1) {
                echo "<td>-</td>";
                }else{
                echo"<td>";
                echo $data['denda'];
                echo "</td>";                                                      
                }
            echo "<td>Lunas</td>";
            echo "</tr>";
        }
    }else{ // Jika data tidak ada
        echo "<tr><td colspan='20'>Data tidak ada</td></tr>";
    }
    ?>
    </table>
    <?php
    $sql2 = mysqli_query($koneksi, $query2); // Eksekusi/Jalankan query dari variabel $query
    $row1 = mysqli_num_rows($sql2);
    while($data = mysqli_fetch_array($sql2)){
        echo "<br>";
        echo "<p>Total Buku yang dipinjam = ".$data['total']."</p>";
    }
    $sql1 = mysqli_query($koneksi, $query1); // Eksekusi/Jalankan query dari variabel $query
    $row1 = mysqli_num_rows($sql1);
    while($data = mysqli_fetch_array($sql1)){
        echo "<br>";
        echo "<p>Total Denda = ".$data['total']."</p>";
    }
    ?>
    <p style="text-align: right;"><?php echo date('d-M-y'); ?></p>
    <p style="text-align: right;">Petugas Perpustakaan</p>
    <br/>
    <br/>
     <p style="text-align: right;">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )</p>
<?php
$html = ob_get_contents();
ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4','landscape');
$dompdf->render(); $dompdf->stream('Transaksi peminjaman.pdf');
?>
</body>
</html>