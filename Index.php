<?php 
include 'inc/koneksi.php';
error_reporting(0);
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo.png">
    <link rel="icon" type="image/png" href="assets/img/logo.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>SISINPUS | SMP Nurul Iman</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css?v=1.2.1" rel="stylesheet"/>
</head>

<body>
    <nav class="navbar navbar-transparent navbar-absolute">
        	<div class="container">
            	<!-- Brand and toggle get grouped for better mobile display -->
            	<div class="navbar-header">
            		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                		<span class="sr-only">Toggle navigation</span>
    		            <span class="icon-bar"></span>
    		            <span class="icon-bar"></span>
    		            <span class="icon-bar"></span>
            		</button>
            		<a class="navbar-brand" href="" style="font-size: 25px;font-weight: bold;">SISINPUS</a>
            	</div>

            	<div class="collapse navbar-collapse" id="navigation-example">
                    
            		<ul class="nav navbar-nav navbar-right">
    					<li >
                            <a href="Index.php" style="font-size: 15px">
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="Book.php" style="font-size: 15px">
                                Koleksi
                            </a>
                        </li>
                        <li>
                            <a href="About.php" style="font-size: 15px">
                               Informasi
                            </a>
                        </li>
                        <li>
                            <a href="inc/login.php" style="font-size: 15px">
                            Login
                            </a>
                        </li>
            		</ul>
            	</div>
        	</div>
        <p style="text-align: center;padding-top: 15px"><img src="assets/img/logo.png" width="20%"></p>
        </nav>

    <div class="page-header header-filter" style="background-image: url('assets/img/Background.jpg');">
        <div class="container">
            <div class="row">
				<div class="col-md-8 col-md-offset-2 text-center" >
					<h1 class="title" style="padding-top:3em">SMP Nurul Iman</h1>
					
				</div>
            </div>
        </div>
    </div>
	<div class="main main-raised">
		<div class="container">
	    	<div class="section text-center">
                <h2 class="title">Ranking Buku Teratas</h2>

				<div class="book">
					<div class="row">
<?php
$hasil = $koneksi->QUERY("SELECT tb_buku.judul, tb_buku.pengarang, tb_buku.penerbit, tb_buku.image, COUNT(tb_peminjaman.kd_peminjaman) as total FROM tb_peminjaman JOIN tb_buku ON tb_peminjaman.kd_buku = tb_buku.kd_buku GROUP BY tb_peminjaman.kd_buku ORDER BY total DESC LIMIT 4");
$rows = $hasil->fetch_All(MYSQLI_ASSOC);
foreach ($rows as $row):
?>
						<div class="col-md-6">
							<div class="card card-profile card-plain">
								<div class="col-md-3">
									<div class="card-image">
										<a href="#pablo">
											<img class="img" src="admin/images/<?php echo $row['image']; ?>" />
										</a>
									</div>
								</div>
								<div class="col-md-9">
									<div class="card-content">
										<h4 class="card-title"><?php echo $row['judul']; ?></h4>
										<br>
										<h6 class="category text-muted"><?php echo $row['penerbit']; ?></h6>
									</div>
								</div>
							</div>
						</div>
<?php 
endforeach;
 ?>
			
					</div>
				</div>

            </div>

            
        	
        </div>

	</div>

    <footer class="footer">
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="https://smpnuruliman.sch.id/" target="_blank">
                            SMP Nurul Iman Jakarta Timur
                        </a>
                    </li>
					
                </ul>
            </nav>
            <div class="copyright pull-right">
                Copyright &copy; <script>document.write(new Date().getFullYear())</script> SMP Nurul Iman
            </div>
        </div>
    </footer>

</body>
	<!--   Core JS Files   -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>

	<!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
	<script src="assets/js/moment.min.js"></script>

	<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   -->
	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

	<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
	<script src="assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

	<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select   -->
	<script src="assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>

	<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/   -->
	<script src="assets/js/bootstrap-tagsinput.js"></script>

	<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput   -->
	<script src="assets/js/jasny-bootstrap.min.js"></script>

	<!--    Plugin For Google Maps   -->
	<script  type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

	<!--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    -->
	<script src="assets/js/material-kit.js?v=1.2.1" type="text/javascript"></script>
</html>
