<?php 
// Download Buku
if (isset($_GET['filebook'])) {
	$dir = "../assets/";

	if(!file_exists($dir.$_GET['filebook'])){
		echo '<script language="javascript">';
          echo 'alert("Download gagal, file sudah tidak ada ")';
          echo '</script>';
          header('Refresh: 0; URL = index.php');
	}else{
		header("Content-Type: octed/stream");
		header("Content-Disposition: attachment; filename=\"".$_GET['filebook']."\"");
		$fp = fopen($dir.$_GET['filebook'], "r");
		$data = fread($fp, filesize($dir.$_GET['filebook']));
		fclose($dir);
		print($data);
	}
}
 ?>