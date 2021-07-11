<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/logo.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>SISINPUS | SMP Nurul Iman</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Canonical SEO -->
    <link rel="canonical" href="//www.creative-tim.com/product/material-dashboard-pro" />
    <!--  Social tags      -->
    <meta name="keywords" content="material dashboard, bootstrap material admin, bootstrap material dashboard, material design admin, material design, creative tim, html dashboard, html css dashboard, web dashboard, freebie, free bootstrap dashboard, css3 dashboard, bootstrap admin, bootstrap dashboard, frontend, responsive bootstrap dashboard, premiu material design admin">
    <meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Material Dashboard PRO by Creative Tim | Premium Bootstrap Admin Template">
    <meta itemprop="description" content="Material Dashboard PRO is a Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design.">
    <meta itemprop="image" content="../s3.amazonaws.com/creativetim_bucket/products/51/opt_mdp_thumbnail.jpg">
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
        <div class="sidebar"data-active-color="blue" data-background-color="black" data-image="../assets/img/bg.jpg">
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
                        <img src="images/<?php echo $row['foto']?>">
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
                        <a href="buku.php">
                            <i class="material-icons">library_books</i>
                            <p>Data Buku</p>
                        </a>
                    </li>
                    
                     <li>
                        <a data-toggle="collapse" href="#Transaksi">
                            <i class="material-icons">assignment</i>
                            <p>Data Transaksi
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="Transaksi">
                            <ul class="nav">
                                <li>
                                   <a href="peminjaman.php">Transaksi Peminjaman & Pengembalian</a>
                                </li>
                                <li>
                                    <a href="history.php">Histori Peminjaman</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#laporan">
                            <i class="material-icons">print</i>
                            <p>Laporan
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="laporan">
                            <ul class="nav">
                                <li>
                                   <a href="laporan/buku.php">Data Buku</a>
                                </li>
                                <li>
                                   <a href="laporan/bukuHilang.php">Data Buku Hilang</a>
                                </li>
                                <li>
                                    <a href="laporan/peminjaman.php">Data Transaksi</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        