<?php 
	$koneksi = mysqli_connect("localhost", "root", "", "cafe") or die("Gagal Koneksi Database");
	$idPesan = $_GET['ID_Menu'];
	$query="DELETE FROM menu WHERE ID_Menu='$idPesan'";
	$sql = mysqli_query($koneksi,$query) or die("Gagal input:".$query);
	header("location:index.php");
?>