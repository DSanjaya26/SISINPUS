<?php 
include '../inc/koneksi.php';
	$ni = $_POST['nis'];
	
	$pw_new = $_POST['pw_new'];
	$pw_new1 = $_POST['pw_new1'];

	if ($ni !="" and $pw_new == $pw_new1) {
	    $qry = mysqli_query($koneksi, "UPDATE `tb_login` SET `password` = MD5('$pw_new') WHERE `tb_login`.`username` = '$ni'");
	    if ($qry) {
				header('location:profile.php?alert=berhasilupdate');
		}
		else{
				header('location:profile.php?alert=gagalupdate');
		}
	}
	else {
	   header('location:profile.php?alert=gagalupdate');
	}
 ?>