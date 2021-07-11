<div class="sidebar" data-active-color="blue" data-background-color="black" data-image="../assets/img/bg.jpg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="dashboard.html" class="simple-text" style="font-size: 15px">
                   SISINPUS | SMP Nurul Iman
                </a>
            </div>
            
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
<?php
    $hasil = $koneksi->QUERY("SELECT * from tb_anggota where nomorInduk = $user;");
    $rows = $hasil->fetch_All(MYSQLI_ASSOC);
    foreach ($rows as $row):
    
?>
                        <img src="../admin/images/<?php echo $row['foto']?>">
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">

<?php
echo $row['nama_anggota'];
endforeach;
?> 
                            <b class="caret"></b>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="profile.php">Profile</a>
                                </li>
                                <li>
                                    <a href="../inc/logout.php">Logout</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li class="active">
                        <a href="index.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li> 
                    <li>
                        <a href="peminjaman.php">
                            <i class="material-icons">book</i>
                            <p>Data Peminjaman Aktif</p>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>