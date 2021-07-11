<?php 
include 'inc/koneksi.php';
include 'Header.php';
error_reporting(0);
 ?>

    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('assets/img/Background.jpg');">
		<div class="container">
			
		</div>
	</div>
	<div class="main main-raised">
		<div class="container">
            <div class="row">

				<div class="col-md-12">
					<h2 class="title" style="text-align: center;font-size: 50px">Detail</h2>
				</div>
				<div class="col-md-12">
					<div class="row">
<?php
$kd_buku = $_GET['kd_buku'];
$hasil = $koneksi->QUERY("SELECT * from tb_buku left join tb_rak on tb_buku.kd_rak = tb_rak.kd_rak JOIN tb_kategori on tb_buku.kd_kategori = tb_kategori.kd_kategori WHERE tb_buku.kd_buku = '$kd_buku'");
$rows = $hasil->fetch_All(MYSQLI_ASSOC);
foreach ($rows as $row):
$hasil = $koneksi->QUERY("Select SUM(tb_peminjaman.jumlah) as jumlah FROM tb_peminjaman WHERE tb_peminjaman.status = 'Dipinjam' and tb_peminjaman.kd_buku = '$kd_buku';");
$rows = $hasil->fetch_All(MYSQLI_ASSOC);
foreach ($rows as $row2):
$pinjam = $row2['jumlah'];
$total = $row['stok'];
$tersedia = $total - $pinjam;
 ?>
 						<div class="col-md-12">
 							<div class="col-md-4 col-md-offset-5">
	 							<img class="img img-raised" width="160px" src="admin/images/<?php echo $row['image'];?>">	
	 							<br><br>
 							</div>
 						</div>
 										
 						<table border="0" style="color: black;font-size: 20px;" align="center" width="60%" cellpadding="">
									<tr >
										<td style="text-align: left;padding-top: 10px;padding-bottom: 10px">Judul</td>
										<td style="text-align: right;"><?php echo $row['judul'];?></td>
									</tr>

									<tr>
										<td style="text-align: left;padding-top: 10px;padding-bottom: 10px">Penerbit</td>
										<td style="text-align: right;"><?php echo $row['penerbit'];?></td>
									</tr>

									<tr>
										<td style="text-align: left;padding-top: 10px;padding-bottom: 10px">Pengarang</td>
										<td style="text-align: right;"><?php echo $row['pengarang'];?></td>
									</tr>
									<tr>
										<td style="text-align: left;padding-top: 10px;padding-bottom: 10px">ISBN</td>
										<td style="text-align: right;"><?php echo $row['isbn'];?></td>
									</tr>
									<tr>
										<td style="text-align: left;padding-top: 10px;padding-bottom: 10px">Kategori</td>
										<td style="text-align: right;"><?php echo $row['kategori'];?></td>
									</tr>
									<tr>
										<td style="text-align: left;padding-top: 10px;padding-bottom: 10px">Rak</td>
										<td style="text-align: right;"><?php echo $row['nama_rak'];?></td>
									</tr>
									<tr>
										<td style="text-align: left;padding-top: 10px;padding-bottom: 10px">Tersedia</td>
										<?php
                                                        if ($tersedia < 1) {
                                                            echo "<td style='text-align: right;'>-</td>";
                                                        }else{
                                                            echo"<td style='text-align: right;'>";
                                                            echo $tersedia;
                                                            echo " Buku</td>";                                                      
                                                        }
                                                    ?>
									</tr>

						</table>
<?php 
endforeach;
?>	
<?php 
endforeach;
?>	
					<br>
    				</div>
				</div>

			</div>
			
        </div>

	</div>

<?php 
include "Footer.php";
 ?>