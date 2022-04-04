<?php

include "koneksi.php";
// membaca id file yang akan dihapus
$id = $_REQUEST['id_cloud'];

//memanggil data nama file dari field berkas
$query = mysql_query("select * from cloud where id_cloud='$id'");
if($ketemu = mysql_fetch_array($query))
{
  $g=$ketemu['nama'];
}
 
// query untuk menghapus informasi file berdasarkan id
$query = "DELETE FROM cloud WHERE id_cloud = '$id'";
mysql_query($query);

// menghapus file dalam folder sesuai namanya
if(unlink("file/".$g)){
	echo "<script>alert('File Data Berhasil Dihapus');
	javascript:history.go(-1)</script>";
        include "index2.php"; exit;
}else{
	echo "<script>alert('File Data Gagal Dihapus');
	javascript:history.go(-1)</script>";
        include "index2.php"; exit;
}

?>


