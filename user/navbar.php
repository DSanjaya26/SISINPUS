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
        		<a class="navbar-brand" href="index.php">SISINPUS | SMP Nurul Iman</a>
        	</div>

        	<div class="collapse navbar-collapse">
        		<ul class="nav navbar-nav navbar-right">
    				<li>
						<a href="index.php">
							<i class="material-icons">apps</i> Home
						</a>
					</li>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="material-icons">person</i>
<?php
    $hasil = $koneksi->QUERY("SELECT nama_anggota from tb_anggota where nomorInduk = $user;");
    $rows = $hasil->fetch_All(MYSQLI_ASSOC);
    foreach ($rows as $row):
    echo $row['nama_anggota'];
    endforeach;
?> 
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu dropdown-with-icons">
							<li>
								<a href="dashboard.php">
									<i class="material-icons">home</i>
									Dashboard
								</a>
							</li>
							<li>
								<a href="../">
									<i class="material-icons">logout</i>
									Logout
								</a>
							</li>
						</ul>
					</li>
        		</ul>
        	</div>
    	</div>
    </nav>

	<!--Modals ALL-->
	
	<!-- Advance Search Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<i class="material-icons">clear</i>
					</button>
					<h4 class="modal-title">Advance Search</h4>
				</div>
				<div class="modal-body">
					<form method="post" action="search2.php">
						<div id="inputs">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<input type="text" value="" placeholder="Judul Buku" class="form-control" name="judul">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<input type="text" value="" placeholder="Pengarang" class="form-control" name="pengarang">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<input type="text" value="" placeholder="ISBN" class="form-control" name="isbn">
									</div>
								</div>
							</div>
						</div>
				<!--end inputs -->
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-info btn-raised btn-round btn-block" value="Search" name="Search">
				</div>
					</form>
			</div>
		</div>
	</div>
	<!--  End Modal -->

	<div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('../assets/img/bg.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<h2 class="title">Pencarian</h2>
				</div>
				<div class="col-md-6 col-md-offset-3">
					<div class="card card-raised card-form-horizontal">
						<div class="card-content">
							<div class="row">
								<br>
								<form method="post" action="search.php">
									<div class="col-md-9">
										<div class="form-group">
											<input type="text" placeholder="Keyword" class="form-control" name="Keyword">
										</div>
									</div>
									<div class="col-md-3">
										<input type="submit" class="btn btn-raised btn-round btn-info btn-block" value="Search">
									<br>
									</div>
								</form>
									<div class="col-md-12">
										<button class="btn btn-info btn-raised btn-round btn-block" data-toggle="modal" data-target="#myModal">				
												Advance Search
										</button>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
