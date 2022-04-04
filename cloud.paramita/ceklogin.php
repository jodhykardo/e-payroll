<?php


$a=$_POST['username'];
$b=md5($_POST['password']);

include "koneksi.php";
$query = mysql_query("select * from admin where username='$a' and password='$b'");
if($query === FALSE) { 
    echo mysql_error(); // TODO: better error handling
}
$data = array();
	while($record = mysql_fetch_array($query)){
		array_push($data, $record);
	}
$cek = mysql_num_rows($query);
if($cek > 0){
	session_start();
	//$query_nama = mysql_query("select * from admin where username='$a' and password='$b'");	
	$_SESSION['username'] = $a;
	$_SESSION['password'] = $b;
	
	
	$data = $data[0];
	$_SESSION['nama'] = $data['nama'];
	$_SESSION['level'] = $data['level'];
	$_SESSION['perusahaan'] = $data['id_perusahaan'];
	//$_SESSION['nama'] = $data['nama'];
	//$_SESSION['level'] = $data['level'];
	//$_SESSION['perusahaan'] = $data['id_perusahaan'];
	header("location:index2.php");
}else{
	echo "<script>alert('Data User dan Password Tidak Cocok..!! ')
	javascript:history.go(-1)</script>";
	exit();
	header("location:index.php");
}
?>