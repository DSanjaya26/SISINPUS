﻿<?php
include "../inc/koneksi.php";
session_start();
$user = $_SESSION['userweb'];
if($_SESSION["userlevel"]!="admin"){
   header('location:../');
}else{
?>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/tables/datatables.net.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:34:01 GMT -->
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
                    </div>
                    
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                       <div class="col-md-12">
                            <div class="card">
                                <form method="post" action="proses.php" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="card-header card-header-text" data-background-color="blue">
                                        <h4 class="card-title">Tambah Buku</h4>
                                    </div>
                                    <div class="card-content">
<?php 
if(isset($_GET['alert'])){
    if ($_GET['alert'] == "Null") {
        echo '<div class="alert alert-warning col-sm-10 col-md-offset-1" role="alert">
                         <div class="alert-icon">
                            <i class="material-icons" style="color:white">warning</i>
                        </div>
                          <p>Harap melengkapi form</p>
        </div>';
    }
}
 ?>
 <?php
// mengambil data barang dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(kd_buku) as kode FROM tb_buku");
$data = mysqli_fetch_array($query);
$kodebuku = $data['kode'];

// mengambil angka dari kode terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kodebuku, 1, 3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;
 
// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "B";
$kode = $huruf . sprintf("%03s", $urutan);
?>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left" style="color: black">Kode Buku</label>
                                            <div class="col-sm-4">
                                                <div class="form-group form-info label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" name="kode" value="<?php echo $kode ?>" readonly>
                                                </div>
                                            </div>
                                            <label class="col-sm-2 label-on-left" style="color: black">Judul Buku</label>
                                            <div class="col-sm-4">
                                                <div class="form-group form-info label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" name="judul">
                                                </div>
                                            </div>
                                            <label class="col-sm-2 label-on-left" style="color: black">ISBN</label>
                                            <div class="col-sm-4">
                                                <div class="form-group form-info label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" name="isbn">
                                                </div>
                                            </div>
                                            <label class="col-sm-2 label-on-left" style="color: black">Pengarang</label>
                                            <div class="col-sm-4">
                                                <div class="form-group form-info label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" name="pengarang">
                                                </div>
                                            </div>
                                            <label class="col-sm-2 label-on-left" style="color: black">Penerbit</label>
                                            <div class="col-sm-4">
                                                <div class="form-group form-info label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" name="penerbit">
                                                </div>
                                            </div>
                                            <label class="col-sm-2 label-on-left" style="color: black">Tahun</label>
                                            <div class="col-sm-4">
                                                <div class="form-group form-info label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" name="tahun">
                                                </div>
                                            </div>
                                            <label class="col-sm-2 label-on-left" style="color: black">Jumlah</label>
                                            <div class="col-sm-4">
                                                <div class="form-group form-info label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" name="stok">
                                                </div>
                                            </div>
                                        
                                            
                                            <label class="col-sm-2 label-on-left" style="color: black">Rak</label>
                                            <div class="col-sm-4">
                                                <select class="selectpicker" data-style="select-with-transition" name="rak">
<?php
$hasil = $koneksi->QUERY("SELECT * from tb_rak;");
$rows = $hasil->fetch_All(MYSQLI_ASSOC);
foreach ($rows as $row):
?> 
                                                    <option value="<?php echo $row['kd_rak']; ?>"><?php echo $row['nama_rak']; ?></option>
<?php 
endforeach;
 ?>
                                                </select>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-2 label-on-left" style="color: black">Kategori</label>
                                            <div class="col-sm-4">
                                                <select class="selectpicker" data-style="select-with-transition" name="kategori">
<?php
$hasil = $koneksi->QUERY("SELECT * from tb_kategori;");
$rows = $hasil->fetch_All(MYSQLI_ASSOC);
foreach ($rows as $row):
?> 
                                                    <option value="<?php echo $row['kd_kategori']; ?>"><?php echo $row['kategori']; ?></option>
<?php 
endforeach;
 ?>
                                                </select>
                                            </div>
                                            <label class="col-sm-2 label-on-left" style="color: black">Cover Buku</label>
                                            <div class="col-sm-4">
                                            <input class="btn btn-file" type="file" name="cover" placeholder="tes">
                                            </div>                                 
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3 col-sm-offset-5">
                                            <input type="submit" class="btn btn-info btn-md" value="Tambah" name="TambahBuku">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search",
                
            }


        });
        $('.card .material-datatables label').addClass('form-group');
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

<script>
$(document).ready(function(){
$("#form-input").css("display","none"); //Menghilangkan form-input ketika pertama kali dijalankan
$(".detail").click(function(){ //Memberikan even ketika class detail di klik (class detail ialah class radio button)
if ($("input[name='tipe']:checked").val() == "Buku" ) { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
$("#form-input").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
} else {
$("#form-input").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
}
});
});
</script>
<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/tables/datatables.net.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:34:01 GMT -->
</html>
<?php 
}
 ?>