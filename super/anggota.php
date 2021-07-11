﻿<!doctype html>
<html lang="en">
<?php 
include "../inc/koneksi.php";
session_start();
$user = $_SESSION['userweb'];
if($_SESSION["userlevel"]!="super"){
   header('location:../');
}else{
?>
<html lang="en">
<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/tables/datatables.net.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:34:01 GMT -->

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
                        <a class="navbar-brand" href="#"> Dashboard > Anggota </a>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
<?php 
if(isset($_GET['alert'])){
    if ($_GET['alert'] == "berhasildelete") {
        echo '<div class="alert alert-success col-sm-10 col-md-offset-1" role="alert">
                         <div class="alert-icon">
                            <i class="material-icons" style="color:white">check</i>
                        </div>
                          <p>Anggota berhasil di hapus</p>
                </div>';
    }
    elseif ($_GET['alert'] == "gagaldelete") {
        echo '<div class="alert alert-warning col-sm-10 col-md-offset-1" role="alert">
                         <div class="alert-icon">
                            <i class="material-icons" style="color:white">warning</i>
                        </div>
                          <p>Anggota gagal di hapus</p>
                </div>';
    }
    elseif ($_GET['alert'] == "berhasilinsert") {
        echo '<div class="alert alert-success col-sm-10 col-md-offset-1" role="alert">
                         <div class="alert-icon">
                            <i class="material-icons" style="color:white">check</i>
                        </div>
                          <p>Tambah Anggota berhasil</p>
                </div>';
    }
    elseif ($_GET['alert'] == "gagalinsert") {
        echo '<div class="alert alert-warning col-sm-10 col-md-offset-1" role="alert">
                         <div class="alert-icon">
                            <i class="material-icons" style="color:white">warning</i>
                        </div>
                          <p>Tambah Anggota gagal</p>
                </div>';
    }
    elseif ($_GET['alert'] == "berhasilupdate") {
        echo '<div class="alert alert-success col-sm-10 col-md-offset-1" role="alert">
                         <div class="alert-icon">
                            <i class="material-icons" style="color:white">check</i>
                        </div>
                          <p>Update Anggota berhasil</p>
                </div>';
    }
    elseif ($_GET['alert'] == "gagalupdate") {
        echo '<div class="alert alert-warning col-sm-10 col-md-offset-1" role="alert">
                         <div class="alert-icon">
                            <i class="material-icons" style="color:white">warning</i>
                        </div>
                          <p>Update Anggota gagal</p>
                </div>';
    }
}
?>
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="blue">
                                    <i class="material-icons">supervisor_account</i>
                                </div>
                               <div class="card-content">
                                    <h4 class="card-title">Data Anggota</h4>
                                    <div class="toolbar text-right">
                                        <a href="insertanggota.php" class="btn btn-sm btn-info btn-icon"><i class="material-icons">add_box</i></a>
                                        <a href="upload.php" class="btn btn-sm btn-info btn-icon"><i class="material-icons">add_box</i>Upload Excel (.xls)</a>

                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="font-size: 12px;">
                                                <tr><th style="font-weight: bold;">NIP/NIS</th>
                                                    <th style="font-weight: bold;">Nama</th>
                                                    <th style="font-weight: bold;">L/P</th>
                                                    <th style="font-weight: bold;">Alamat</th>
                                                    <th style="font-weight: bold;">No.Hp</th>
                                                    <th style="font-weight: bold;">Status</th>
                                                    <th style="font-weight: bold;" class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
<?php
$hasil = $koneksi->QUERY("SELECT * FROM tb_anggota JOIN tb_login on tb_anggota.NomorInduk = tb_login.username where akses='anggota' order by tb_anggota.NomorInduk;");
$rows = $hasil->fetch_All(MYSQLI_ASSOC);
foreach ($rows as $row):
?> 
                                            <tr>
                                                    <td><?php echo $row['NomorInduk']; ?></td>
                                                    <td><?php echo $row['nama_anggota']; ?></td>
                                                    <td><?php echo $row['jk_anggota']; ?></td>
                                                    <td><?php echo $row['alamat']; ?></td>
                                                    <td><?php echo $row['no_telp']; ?></td>
                                                    <td><?php echo $row['status']; ?></td>
                                                    <td class="text-right">
                                                        <a href="editanggota.php?nis=<?php echo $row['NomorInduk']; ?>" class="btn btn-sm btn-warning btn-icon"><i class="material-icons">edit</i></a><br>
                                                        <a href="proses.php?NomorInduk=<?php echo $row['NomorInduk']; ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger btn-icon"><i class="material-icons">delete</i></a>
                                                    </td>

                                            </tr>
 <?php 
endforeach;
  ?>                                               
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                        <!-- end col-md-12 -->
                    </div>
                    <!-- end row -->
                </div>
            </div>
<footer class="footer">
    <div class="container-fluid">
        <p class="copyright pull-right">
        &copy;
        <script>
            document.write(new Date().getFullYear())
        </script>
        Copyright &copy; <script>document.write(new Date().getFullYear())</script> SMP Nurul Iman
        </p>
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
        $('#datatables').DataTable({
            
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            bSort: false,
            responsive: true,
            responsiveLayout:true,

            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        $('.card .material-datatables label').addClass('form-group');
    });
</script>
<script>
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(300, 10).slideDown(200, function(){
                $(this).remove();
            });
        }, 4000);
    });    
    </script>



<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/tables/datatables.net.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:34:01 GMT -->
</html>
<?php 
}
?>