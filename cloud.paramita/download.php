<?php
include"koneksi.php";
// membaca id file dari link
$a = $_GET['id_cloud'];
 
// membaca informasi file dari tabel berdasarkan id nya
$query  = "SELECT * FROM cloud WHERE id_cloud='$a'";
$hasil  = mysql_query($query);
$data = mysql_fetch_array($hasil);

// header yang menunjukkan nama file yang akan didownload
header("Content-Disposition: attachment; filename=".$data['nama']);
 
// header yang menunjukkan ukuran file yang akan didownload
header("Content-length: ".$data['ukuran']);
 
// header yang menunjukkan jenis file yang akan didownload
header("Content-type: ".$data['tipe']);
 
// proses membaca isi file yang akan didownload dari folder 'data'
$fp  = fopen("file/".$data['nama'], 'r');
$content = fread($fp, filesize('file/'.$data['nama']));
fclose($fp);
 
// menampilkan isi file yang akan didownload
echo $content;
 
exit;
?>

