<?php
include "../inc/koneksi.php";
session_start();
$user = $_SESSION['userweb'];
if($_SESSION["userlevel"]!="admin"){
   header('location:../');
   
}else{
?>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/logo.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>SISINPUS | SMP Nurul Iman</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/google-roboto-300-700.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
<?php 
include 'sidebar.php';
 ?>
        <div class="main-panel">
             <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Dashboard </a>
                    </div>
                    
                </div>
            </nav>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
<?php
$hasil = $koneksi->QUERY("SELECT COUNT(tb_anggota.NomorInduk) as anggota FROM tb_anggota JOIN tb_login ON tb_anggota.NomorInduk = tb_login.username WHERE tb_login.akses ='anggota';");
$rows = $hasil->fetch_All(MYSQLI_ASSOC);
foreach ($rows as $row):
    $user = $row['anggota'];
 ?>  
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">person</i>
                                </div>
                                <div class="card-content">
                                    <p class="category" style="color: black">Anggota</p>
                                    <h3 class="card-title"><?php echo $user ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                       <a href="anggota.php" style="color: black;font-size: 13px">Details ></a>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php 
endforeach;
 ?>
 <?php
$hasil = $koneksi->QUERY("SELECT COUNT(tb_buku.kd_buku) as jumlah FROM tb_buku");
$rows = $hasil->fetch_All(MYSQLI_ASSOC);
foreach ($rows as $row):
    $book = $row['jumlah'];
 ?> 
                      <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">book</i>
                                </div>
                                <div class="card-content">
                                    <p class="category" style="color: black">Buku</p>
                                    <h3 class="card-title"><?php echo $book; ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                       <a href="buku.php" style="color: black;font-size: 13px">Details ></a>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php 
endforeach;
 ?>
                        
<?php
$hasil = $koneksi->QUERY("SELECT COUNT(tb_peminjaman.kd_peminjaman) as jumlah FROM tb_peminjaman WHERE tb_peminjaman.status = 'Dipinjam'");
$rows = $hasil->fetch_All(MYSQLI_ASSOC);
foreach ($rows as $row):
    $pinjaman = $row['jumlah'];
 ?> 
                      <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <p class="category" style="color: black">Peminjaman Aktif</p>
                                    <h3 class="card-title"><?php echo $pinjaman; ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <a href="peminjaman.php" style="color: black;font-size: 13px">Details ></a>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php 
endforeach;
 ?>
 <?php
$now = date('Y-m-d');
$hasil = $koneksi->QUERY("SELECT COUNT(tb_peminjaman.kd_peminjaman) as jumlah FROM tb_peminjaman WHERE tb_peminjaman.status = 'Dipinjam' AND tb_peminjaman.tgl_kembali < '$now'");
$rows = $hasil->fetch_All(MYSQLI_ASSOC);
foreach ($rows as $row):
    $pinjaman = $row['jumlah'];
 ?> 
                      <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">warning</i>
                                </div>
                                <div class="card-content">
                                    <p class="category" style="color: black">Peminjaman Melewati Batas Waktu</p>
                                    <h3 class="card-title"><?php echo $pinjaman; ?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <a href="peminjaman2.php" style="color: black;font-size: 13px">Details ></a>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php 
endforeach;
 ?>
                    </div>
                </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">description</i>
                                </div>
                                <div class="card-content">
                                    <h2 class="card-title" style="text-align: left;">Infomation</h2>
                                </div>
                                <div class="card-footer">
                                    <div class="col-md-6" style="color: black">
                                        <h4>Pada sistem ini anda dapat melakukan :</h4><br>
                                        <h5>a.  Mengelola data buku perpustakaan SMP Nurul Iman<br><br>
                                        b.  Mengelola data peminjaman buku perpustakaan SMP Nurul Iman<br><br>
                                        c.  Mengelola data anggota perpustakaan SMP Nurul Iman<br><br>
                                        d.  Mengelola data rak perpustakaan SMP Nurul Iman<br><br>
                                        e.  Mengelola data kelas SMP Nurul Iman<br><br>
                                        e.  Mengubah data diri<br><br></h5>
                                    </div>
                                    <div class="col-md-6" style="color: black">
                                        <h4>Catatan :</h4><br>
                                        <h5>a.  Username pada login sistem menggunakan Nomor Induk SMP Nurul Iman<br><br>
                                        b.  Password bagi anggota baru menggunakan nomor telepon anggota<br><br>
                                        </h5>
                                        <br>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
            </div>

            <footer class="footer">
                    <div class="copyright">
                        Copyright &copy; <script>document.write(new Date().getFullYear())</script> SMP Nurul Iman
                    </div>
             </footer>
        </div>
    </div>
    
</body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<script src="../assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="../assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="../assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="../assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="../assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="../assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<!--<script src="../assets/js/jquery.select-bootstrap.js"></script>-->
<!-- Select Plugin -->
<script src="../assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="../assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="../assets/js/sweetalert2.js"></script>
<!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="../assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="../assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

        demo.initVectorMap();
    });
</script>
<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(200, 10).slideDown(200, function(){
                $(this).remove();
            });
        }, 4000);
    });    
    </script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:16 GMT -->
</html>
<?php 
}
?>