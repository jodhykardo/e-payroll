<?php
/*
-- Source Code from My Notes Code (www.mynotescode.com)
-- 
-- Follow Us on Social Media
-- Facebook : http://facebook.com/mynotescode/
-- Twitter  : http://twitter.com/code_notes
-- Google+  : http://plus.google.com/118319575543333993544
--
-- Terimakasih telah mengunjungi blog kami.
-- Jangan lupa untuk Like dan Share catatan-catatan yang ada di blog kami.
*/

// Load file koneksi.php
include "ceksesi.php";

$b=$_SESSION['nama'];
// setting nama folder tempat upload
$uploaddir = 'file/';
 
// membaca nama file yang diupload
$fileName = $_FILES['file']['name'];    
 
// nama file temporary yang akan disimpan di server
$tmpName  = $_FILES['file']['tmp_name'];
 
// membaca ukuran file yang diupload
$fileSize = $_FILES['file']['size'];

// membaca jenis file yang diupload
$fileType = $_FILES['file']['type'];
 

// menggabungkan nama folder dan nama file
$uploadfile = $uploaddir . $fileName;

if($fileType == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
	include"koneksi.php";
$a=$_REQUEST['t1'];
$c=date('Y-m-d H:i:s');
$kueri="INSERT INTO  cloud(nama1,uploader,tipe,ukuran,nama,tgl_upload)values('$a','$b','$fileType','$fileSize','$fileName','$c')";
$hasil=mysql_query($kueri);
//echo "File telah diupload";

//echo "<script>alert('Berhasil Upload File');javascript:history.go(-1)</script>";
//        include "uploadfile.php"; exit;} 
 

header('location: index2.php');
}else {
echo "<script>alert('Hanya File Excel(.xlsx) Yang Diperbolehkan');javascript:history.go(-1)</script>";
        include "uploadfile.php"; exit;}
?>
