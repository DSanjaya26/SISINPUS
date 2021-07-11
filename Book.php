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
					<h2 class="title" style="text-align: center;font-size: 50px">Koleksi Buku</h2>
				</div>
				
				<div class="col-md-4 col-md-offset-7">
                    <div class="row">
                        <form method="GET" action="">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" placeholder="Keyword" class="form-control" / name="Keyword">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <br><input type="submit" style="font-weight: bold;color: black" class="btn btn-info btn-simple" value="Search">
                                </div>
                            </form>
                            <div class="col-md-2">
                                <br><input type="submit" style="font-weight: bold;color: black" class="btn btn btn-info btn-simple" data-toggle="modal" data-target="#myModal" value="Advance Search">
                            </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-12">
                
                    <?php
                        $per_page = 6;
                        $page = 1;
                        if(isset($_GET['link'])){
                            $page=$_GET['link'];
                            $page=($page>1) ? $page : 1;
                        }
                        if (isset($_GET['Keyword'])) {
                            $key = $_GET['Keyword'];
                            $hasil = $koneksi->QUERY("SELECT * FROM tb_buku WHERE tb_buku.judul LIKE '%$key%' or tb_buku.pengarang LIKE '%$key%' or tb_buku.penerbit LIKE '%$key%' or tb_buku.isbn LIKE '%$key%'");
                            $tes = mysqli_num_rows($hasil);
                            $total_page = ceil($tes/$per_page);
                            $offset=($page-1)*$per_page;
                            $hasil2 = $koneksi->QUERY("SELECT * FROM tb_buku WHERE tb_buku.judul LIKE '%$key%' or tb_buku.pengarang LIKE '%$key%' or tb_buku.penerbit LIKE '%$key%' or tb_buku.isbn LIKE '%$key%' LIMIT $per_page OFFSET $offset");
                            $rows = $hasil2->fetch_All(MYSQLI_ASSOC);
                            foreach ($rows as $row):
                    ?>
                        <div class="col-md-6">
                            <div class="card card-profile card-plain">
                                <div class="col-md-4">
                                    <div class="card-image">
                                        <a href="#pablo">
                                            <img class="img" src="admin/images/<?php echo $row['image']; ?>" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-content">
                                        <h4 class="card-title"><?php echo $row['judul']; ?></h4>
                                        <br>
                                        <h6 class="category text-muted"><?php echo $row['pengarang']; ?></h6>
                                        <h6 class="category text-muted"><?php echo $row['penerbit']; ?></h6>
                                        <br>
                                        <a href="detail.php?kd_buku=<?php echo $row['kd_buku']; ?>"><p style="color: black;font-weight: bold;" class="category text-right">Details <i class="fa fa-angle-right" aria-hidden="true"></i></p></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php 
                            endforeach;
                    ?>
                </div>
            </div>
            <div class="col-sm-offset-5" style="">
                <ul class="pagination pagination-info">
                <?php
                    if(isset($total_page)) {
                       if ($total_page>1) { 
                            if($page>1) {
                ?>
                                <li ><a class="btn btn-raised btn-round btn-info btn-block" href="Book.php?link=<?php echo $page-1; ?>&&Keyword=<?php echo $key ;?>">Previous</a></li>
                <?php 
                            }
                ?>
                </ul>
                <ul class="pagination pagination-info">
                <?php
                            if($page<$total_page){
                ?>
                                <li><a class="btn btn-raised btn-round btn-info btn-block" href="Book.php?link=<?php echo $page+1 ;?>&&Keyword=<?php echo $key ;?>">Next</a></li>
                <?php 
                            }
                        }
                    }
                ?>
                </ul>
            </div>
                    <?php 
                        }
                        elseif (isset($_GET['Search']) or isset($_GET['judul']) or isset($_GET['pengarang']) or isset($_GET['penerbit'])) {
                            $judul = $_GET['judul'];
                            $pengarang = $_GET['pengarang'];
                            $penerbit = $_GET['penerbit'];
                            $hasil = $koneksi->QUERY("SELECT * FROM tb_buku WHERE tb_buku.judul LIKE '%$judul%' and tb_buku.pengarang LIKE '%$pengarang%' and tb_buku.penerbit LIKE '%$penerbit%'");
                            $tes = mysqli_num_rows($hasil);
                            $total_page = ceil($tes/$per_page);
                              $offset=($page-1)*$per_page;

                            $hasil2 = $koneksi->QUERY("SELECT * FROM tb_buku WHERE tb_buku.judul LIKE '%$judul%' and tb_buku.pengarang LIKE '%$pengarang%' and tb_buku.penerbit LIKE '%$penerbit%' LIMIT $per_page OFFSET $offset");
                            $rows = $hasil2->fetch_All(MYSQLI_ASSOC);
                            foreach ($rows as $row):
                    ?>
                        <div class="col-md-6">
                            <div class="card card-profile card-plain">
                                <div class="col-md-4">
                                    <div class="card-image">
                                        <a href="#pablo">
                                            <img class="img" src="admin/images/<?php echo $row['image']; ?>" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-content">
                                        <h4 class="card-title"><?php echo $row['judul']; ?></h4>
                                        <br>
                                        <h6 class="category text-muted"><?php echo $row['pengarang']; ?></h6>
                                        <h6 class="category text-muted"><?php echo $row['penerbit']; ?></h6>
                                        <br>
                                        <a href="detail.php?kd_buku=<?php echo $row['kd_buku']; ?>"><p style="color: black;font-weight: bold;" class="category text-right">Details <i class="fa fa-angle-right" aria-hidden="true"></i></p></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php 
                            endforeach;
                    ?>
                </div>
            </div>
            <div class="col-sm-offset-5" style="">
                <ul class="pagination pagination-info">
                <?php
                    if(isset($total_page)) {
                       if ($total_page>1) { 
                            if($page>1) {
                ?>
                                <li ><a class="btn btn-raised btn-round btn-info btn-block" href="Book.php?link=<?php echo $page-1; ?>&&judul=<?php echo $judul ;?>&&pengarang=<?php echo $pengarang ;?>&&penerbit=<?php echo $penerbit ;?>">Previous</a></li>
                <?php 
                            }
                ?>
                </ul>
                <ul class="pagination pagination-info">
                <?php
                            if($page<$total_page){
                ?>
                                <li><a class="btn btn-raised btn-round btn-info btn-block" href="Book.php?link=<?php echo $page+1 ;?>&&judul=<?php echo $judul ;?>&&pengarang=<?php echo $pengarang ;?>&&penerbit=<?php echo $penerbit ;?>">Next</a></li>
                <?php 
                            }
                        }
                    }
                ?>
                </ul>
            </div> 
                    <?php 
                    }
                    else{
                        $hasil = $koneksi->QUERY("SELECT * FROM tb_buku");
                            $tes = mysqli_num_rows($hasil);
                            $total_page = ceil($tes/$per_page);
                              $offset=($page-1)*$per_page;

                            $hasil2 = $koneksi->QUERY("SELECT * FROM tb_buku LIMIT $per_page OFFSET $offset");
                            $rows = $hasil2->fetch_All(MYSQLI_ASSOC);
                            foreach ($rows as $row):
                    ?>
                        <div class="col-md-6">
                            <div class="card card-profile card-plain">
                                <div class="col-md-4">
                                    <div class="card-image">
                                        <a href="#pablo">
                                            <img class="img" src="admin/images/<?php echo $row['image']; ?>" />
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-content">
                                        <h3 class="card-title"><?php echo $row['judul']; ?></h3>
                                        <br>
                                        <h6 class="category text-muted"><?php echo $row['pengarang']; ?></h6>
                                        <h6 class="category text-muted"><?php echo $row['penerbit']; ?></h6>
                                        <br>
                                        <a href="detail.php?kd_buku=<?php echo $row['kd_buku']; ?>"><p style="color: black;font-weight: bold;" class="category text-right">Details <i class="fa fa-angle-right" aria-hidden="true"></i></p></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php 
                            endforeach;
                    ?>
                </div>
            </div>
            <div class="col-sm-offset-5" style="">
                <ul class="pagination pagination-info">
                <?php
                    if(isset($total_page)) {
                       if ($total_page>1) { 
                            if($page>1) {
                ?>
                                <li ><a class="btn btn-raised btn-round btn-info btn-block" href="Book.php?link=<?php echo $page-1; ?>">Previous</a></li>
                <?php 
                            }
                ?>
                </ul>
                <ul class="pagination pagination-info">
                <?php
                            if($page<$total_page){
                ?>
                                <li><a class="btn btn-raised btn-round btn-info btn-block" href="Book.php?link=<?php echo $page+1 ;?>">Next</a></li>
                <?php 
                            }
                        }
                    }
                ?>
                </ul>
            </div>
                    <?php 
                    }
                    ?>        
        </div>		
	</div>
<?php 
include "Footer.php";
?>