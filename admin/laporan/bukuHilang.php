<?php
include "../../inc/koneksi.php";
session_start();
$user = $_SESSION['userweb'];
if($_SESSION["userlevel"]!="admin"){
   header('location:../../');
}else{
?>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../../assets/img/logo.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>E-Library | SMP Nurul Iman</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../../assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="../../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../../assets/css/google-roboto-300-700.css" rel="stylesheet" />
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
                        <a class="navbar-brand" href="#"> Dashboard > Laporan </a>
                    </div>
                    
                </div>
            </nav>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-0">
                            <h2>Laporan Buku Hilang</h2><hr>

   

    <?php

        echo '<b>Semua Data Buku</b><br /><br />';
        echo '<a href="print3.php" class="btn btn-sm btn-info btn-icon"><i class="material-icons">print</i>Cetak PDF</a><br /><br />';

        $query = "SELECT * FROM `tb_bukuhilang` LEFT JOIN tb_peminjaman on tb_bukuhilang.kd_peminjaman = tb_peminjaman.kd_peminjaman LEFT JOIN tb_anggota on tb_peminjaman.kd_anggota =  tb_anggota.NomorInduk LEFT JOIN tb_buku on tb_peminjaman.kd_buku = tb_buku.kd_buku"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
    ?>
<div class="material-datatables">
    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <thead style="font-size: 12px;">
            <tr>
            <th style="font-weight: bold;">NIS</th>
            <th style="font-weight: bold;">Nama</th>
            <th style="font-weight: bold;">Judul</th>
            <th style="font-weight: bold;">Jumlah</th>
            </tr>
        </thead>
                                   
        <tbody>

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
                        </div>
                    </div>
       </div>         </div>

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
<script src="../../assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="../../assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/js/material.min.js" type="text/javascript"></script>
<script src="../../assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../../assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../../assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="../../assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="../../assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="../../assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="../../assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="../../assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="../assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="../../assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<!--<script src="../assets/js/jquery.select-bootstrap.js"></script>-->
<!-- Select Plugin -->
<script src="../../assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="../../assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="../../assets/js/sweetalert2.js"></script>
<!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../../assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="../../assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="../../assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../../assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>
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
    <script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable({
            
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            bSort: false,
            responsive: true,
            responsiveLayout:true,
            headerSort:false,

            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        $('.card .material-datatables label').addClass('form-group');
    });
</script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:32:16 GMT -->
</html>
<?php 
}
?>