<?php 
session_start();
include 'koneksi.php'; 
error_reporting(0);
ob_start();
?>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/logo.png">
	<link rel="icon" type="image/png" href="../assets/img/logo.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>SISINPUS | SMP Nurul Iman</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/material-kit.css?v=1.2.1" rel="stylesheet"/>
</head>

<body class="login-page">
	<nav class="navbar navbar-info navbar-transparent navbar-absolute">
    	<div class="container">
        	<!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">SISINPUS | SMP Nurul Iman</a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <ul class="nav navbar-nav navbar-right">
                        <li >
                            <a href="../Index.php" style="font-size: 15px">
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="../Book.php" style="font-size: 15px">
                                Koleksi
                            </a>
                        </li>
                        <li>
                            <a href="../About.php" style="font-size: 15px">
                               Informasi
                            </a>
                        </li>                        
                    </ul>
                </ul>
            </div>
    	</div>
    </nav>

	<div class="page-header header-filter" style="background-image: url('../assets/img/Background.jpg'); background-size: cover; background-position: top center;">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
					<div class="card card-signup">
						
							<div class="header header-info text-center">
								<h3 class="card-title">Silahkan Masuk</h3>      
							</div>

                            <form class="form" method="POST" action="">
							<div class="card-content">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">face</i>
									</span>
                                    
									<input type="text" class="form-control" placeholder="Username" name="username">
								</div>

								<div class="input-group">
									<span class="input-group-addon">
										<i class="material-icons">lock_outline</i>
									</span>
									<input type="password" placeholder="Password..." class="form-control" name="password" />
								</div>

							</div>
							<div class="footer text-center">
								<input type="submit" class="btn btn-info btn-sm" value="login" name="login">
							</div>
						</form>
<?php 
if(isset($_POST['login']))  {
    $user = $_POST['username'];
    $pass = md5($_POST['password']);
     if (empty($user) or empty($pass)) {
         echo '<div class="alert alert-warning col-sm-10 col-md-offset-1" role="alert">
                     <div class="alert-icon">
                        <i class="material-icons">warning</i>
                    </div>
                      <b style="color:black">Login gagal, username atau kata sandi anda salah</b>
            </div>';       
    }
    else{
        $qry = mysqli_query($koneksi, "SELECT * FROM `tb_login` WHERE username ='$user' AND password ='$pass'");
        $ada = mysqli_num_rows($qry);
        $data = mysqli_fetch_array($qry);
        $level = $data['akses'];
        if ($ada > 0) {
            if ($level == "admin") {
                $_SESSION['userweb']=$user;
                $_SESSION['userlevel']=$level;
                header("location:../admin/index.php");
            }
            elseif ($level == "anggota") {
                $_SESSION['userweb']=$user;
                $_SESSION['userlevel']=$level;
                header("location:../user/index.php");
            }elseif ($level == "super") {
                $_SESSION['userweb']=$user;
                $_SESSION['userlevel']=$level;
                header("location:../super/index.php");
            }
        }
        else {
            echo '<div class="alert alert-warning col-sm-10 col-md-offset-1" role="alert">
                     <div class="alert-icon">
                        <i class="material-icons">warning</i>
                    </div>
                      <p style="color:black">Login gagal, username atau kata sandi anda salah</p>
            </div>';
        }
    }

}
 ?>       
					</div>
				</div>
			</div>
		</div>

        <br><br><br>
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
	</div>

</body>
	<!--   Core JS Files   -->
	<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/material.min.js"></script>

	<!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
	<script src="../assets/js/moment.min.js"></script>

	<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   -->
	<script src="../assets/js/nouislider.min.js" type="text/javascript"></script>

	<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
	<script src="../assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

	<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select   -->
	<script src="../assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>

	<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/   -->
	<script src="../assets/js/bootstrap-tagsinput.js"></script>

	<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput   -->
	<script src="../assets/js/jasny-bootstrap.min.js"></script>

	
	<!--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    -->
	<script src="../assets/js/material-kit.js?v=1.2.1" type="text/javascript"></script>
    <script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(300, 10).slideDown(200, function(){
                $(this).remove();
            });
        }, 4000);
    });    
    </script>
</html>