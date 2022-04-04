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
include "koneksi2.php";

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
	$nama_file_baru = 'data.xlsx';
	
	// Load librari PHPExcel nya
	require_once 'PHPExcel/PHPExcel.php';
	
	$excelreader = new PHPExcel_Reader_Excel2007();
	$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
	$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	
	// Buat query Insert
	$sql = $pdo->prepare("INSERT INTO absen VALUES(:id_karyawan,:nama,:tanggal,:waktu1,:waktu2,:waktu3,:waktu4)");
	
	$numrow = 1;
	foreach($sheet as $row){
		// Ambil data pada excel sesuai Kolom
		$id_karyawan = $row['A']; // Ambil data NIS
		$nama = $row['B']; // Ambil data nama
		$tanggal = $row['C']; // Ambil data jenis kelamin
		$waktu1 = $row['D']; // Ambil data telepon
		$waktu2 = $row['E']; // Ambil data alamat
		$waktu3 = $row['F'];
		$waktu4 = $row['G'];
		// Cek jika semua data tidak diisi
		if(empty($id_karyawan) && empty($nama))
			continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
		
		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
		if($numrow > 1){
			// Proses simpan ke Database
			$sql->bindParam(':id_karyawan', $id_karyawan);
			$sql->bindParam(':nama', $nama);
			$sql->bindParam(':tanggal', $format = date('Y-m-d', strtotime($tanggal)));
			$sql->bindParam(':waktu1', $waktu1);
			$sql->bindParam(':waktu2', $waktu2);
			$sql->bindParam(':waktu3', $waktu3);
			$sql->bindParam(':waktu4', $waktu4);
			$sql->execute(); // Eksekusi query insert
		}
		
		$numrow++; // Tambah 1 setiap kali looping
	
	}
}

header('location: index2.php'); // Redirect ke halaman awal
?>
