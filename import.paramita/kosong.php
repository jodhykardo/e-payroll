<?php
include "koneksi.php";

$now = date('Y-m-26');
$cek = mysql_query("SELECT * FROM telat WHERE bulan='$now'");
$jml = mysql_num_rows($cek);
if($jml>0){
while($data = mysql_fetch_array($cek)){
	$sqlhapus = mysql_query("DELETE FROM telat WHERE bulan='$now'");
				}
	echo "<script>alert('Tabel Perhitungan Telah Dikosongkan!');javascript:history.go(-1)</script>";
        include "index2.php"; exit;
}
else
{
	echo "<script>alert('Belum Ada Data! Silahkan Hitung Terlebih Dahulu!');javascript:history.go(-1)</script>";
        include "index2.php"; exit;
}
