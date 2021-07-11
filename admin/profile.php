<?php
include "../inc/koneksi.php";
session_start();
$user = $_SESSION['userweb'];
if($_SESSION["userlevel"]!="admin"){
   header('location:../');
}else{
?>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/user.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:33:47 GMT -->
<head>
    <meta charset="utf-8" />
   <link rel="icon" type="image/png" href="../assets/img/logo.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     <title>E-Library | SMP Nurul Iman</title>
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
                        <a class="navbar-brand" href="#"> Profile </a>
                    </div>
                    
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <?php 
if(isset($_GET['alert'])){
    if ($_GET['alert'] == "berhasilupdate") {
        echo '<div class="alert alert-success col-sm-10 col-md-offset-1" role="alert">
                         <div class="alert-icon">
                            <i class="material-icons" style="color:white">check</i>
                        </div>
                          <p>Update berhasil</p>
                </div>';
    }
    elseif ($_GET['alert'] == "gagalupdate") {
        echo '<div class="alert alert-warning col-sm-10 col-md-offset-1" role="alert">
                         <div class="alert-icon">
                            <i class="material-icons" style="color:white">warning</i>
                        </div>
                          <p>Update gagal</p>
                </div>';
    }
}
?>
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="blue">
                                    <i class="material-icons">perm_identity</i>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Profile</h3>
                                    <form>
<?php
$hasil = $koneksi->QUERY("SELECT * from tb_anggota where NomorInduk='$user';");
$rows = $hasil->fetch_All(MYSQLI_ASSOC);
foreach ($rows as $row):
 ?>  
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-info">
                                                    <label class="control-label" style="font-size: 15px">NIS / NIP</label>
                                                    <input type="text" class="form-control" readonly value="<?php echo $row['NomorInduk']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-info">
                                                    <label class="control-label" style="font-size: 15px">Nama Lengkap</label>
                                                    <input type="text" class="form-control"readonly value="<?php echo $row['nama_anggota']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-info">
                                                    <label class="control-label" style="font-size: 15px">Nomor Telepon</label>
                                                    <input type="text" class="form-control"readonly value="<?php echo $row['no_telp']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group form-info">
                                                    <label class="control-label" style="font-size: 15px">Alamat</label>
                                                        <textarea class="form-control" rows="5" readonly><?php echo $row['alamat']; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="editprofile.php?nis=<?php echo $row['NomorInduk']; ?>" class="btn btn-info pull-right">Update Profile</a>
                                        <div class="clearfix"></div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-avatar">
                                        <img class="img" src="images/<?php echo $row['foto']; ?>" />
                                </div>
 <?php 
endforeach;
 ?>
                                <div class="card-content">
                                    <a href="updatefoto.php?nis=<?php echo $row['NomorInduk']; ?>" class="btn btn-info btn-round">Ganti Foto</a>
                                    <a href="updatepassword.php?nis=<?php echo $row['NomorInduk']; ?>" class="btn btn-info btn-round">Ganti Password</a>
                                </div>
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
<!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->
<!-- Select Plugin -->
<script src="../assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="../assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="../assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="../assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="../assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>
<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(200, 10).slideDown(200, function(){
                $(this).remove();
            });
        }, 4000);
    });    
    </script>

<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/pages/user.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:33:48 GMT -->
</html>
<?php 
}
?>