<!--
-- Source Code from My Notes Code (www.mynotescode.com)
-- 
-- Follow Us on Social Media
-- Facebook : http://facebook.com/mynotescode/
-- Twitter  : http://twitter.com/code_notes
-- Google+  : http://plus.google.com/118319575543333993544
--
-- Terimakasih telah mengunjungi blog kami.
-- Jangan lupa untuk Like dan Share catatan-catatan yang ada di blog kami.
-->

<!DOCTYPE html>
<?php
include "ceksesi.php";
// mengaktifkan session



?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Cloud Storage</title>

		<!-- Load File bootstrap.min.css yang ada difolder css -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- Style untuk Loading -->
		<style>
        #loading{
			background: whitesmoke;
			position: absolute;
			top: 140px;
			left: 82px;
			padding: 5px 10px;
			border: 1px solid #ccc;
		}
		</style>
	</head>
	<body>
		<!-- Membuat Menu Header / Navbar -->
		<nav class="navbar navbar-inverse" role="navigation" style="background-color: #30a5ff" width="110%">
			<div class="container-fluid">
				<div class="navbar-header" style="background-color: #30a5ff">
					<a class="navbar-brand" href="#" style="color: white;"><b>Cloud Storage</b></a>
					</div>
				 <a class="navbar-brand pull-right" href="#" style="color: white;"><b>Selamat Datang "<?php echo "$_SESSION[nama]"; ?>"</b></a>
		</nav>
		
		<!-- Content -->
		<div style="padding: 0 15px;">
			<!-- 
			-- Buat sebuah tombol untuk mengarahkan ke form import data
			-- Tambahkan class btn agar terlihat seperti tombol
			-- Tambahkan class btn-success untuk tombol warna hijau
			-- class pull-right agar posisi link berada di sebelah kanan
			-->
			<a href="logout.php" class="btn btn-danger pull-right">
				<span class="glyphicon glyphicon-log-out"></span> Log Out
			</a>
			<a href="form.php" class="btn btn-success pull-right">
				<span class="glyphicon glyphicon-upload"></span> Upload Data
			</a>
			
			<h3>Data File Di Cloud</h3>
			
			<hr>
			
			<!-- Buat sebuah div dan beri class table-responsive agar tabel jadi responsive -->
			<div class="table-responsive">
				<table class="table table-striped width="100%"">
					<tr>
						<th>No</th>
						<th>Icon</th>
						<th>Pengupload</th>
						<th>Nama File</th>
						<th>Ukuran</th>
						<th>Aksi</th>
					</tr>
					<?php
					// Load file koneksi.php
					include "koneksi.php";
					
						$sql = mysql_query("SELECT * FROM cloud");
						$sql2 = mysql_query("SELECT * FROM cloud where uploader='$_SESSION[nama]'");
						
				
				
					
					$no = 1; // Untuk penomoran tabel, di awal set dengan 1
					if($_SESSION['level']=="Super_Admin"){
					while($data = mysql_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
						$kb=number_format($data['ukuran']/1024);
						echo "<tr>";
						echo "<td>".$no."</td>";
						echo "<td><img src='image/excel.png' height='30' width='30' </td> ";
						echo "<td>".$data['uploader']."</td>";
						echo "<td>".$data['nama1']."</td>";
						echo "<td>".$kb." KB</td>";
						echo "<td>
						<a class='btn btn-primary' href='download.php?id_cloud=".$data['id_cloud']."'><i class='glyphicon glyphicon-download'></i></a>
						<a class='btn btn-danger' href='hapus.php?id_cloud=".$data['id_cloud']."'><i class='glyphicon glyphicon-trash'></i></a></td>";}}
						else
						{
							while($data = mysql_fetch_array($sql2)){ // Ambil semua data dari hasil eksekusi $sql
						$kb=number_format($data['ukuran']/1024);
						echo "<tr>";
						echo "<td>".$no."</td>";
						echo "<td><img src='image/excel.png' height='30' width='30' </td> ";
						echo "<td>".$data['uploader']."</td>";
						echo "<td>".$data['nama1']."</td>";
						echo "<td>".$kb." KB</td>";
						echo "<td>
						<a class='btn btn-primary' href='download.php?id_cloud=".$data['id_cloud']."'><i class='glyphicon glyphicon-download'></i></a>
						<a class='btn btn-danger' href='hapus.php?id_cloud=".$data['id_cloud']."'><i class='glyphicon glyphicon-trash'></i></a></td>";}
						}
						
						
						echo "</tr>";
						
						$no++; // Tambah 1 setiap kali looping
						
					?>
				</table>				
			</div>
		</div>
	</body>
</html>
