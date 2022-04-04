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
		
		<title>Import Data Absensi</title>

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
					<a class="navbar-brand" href="#" style="color: white;"><b>Import Data Absensi</b></a>
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
			<form action='kosong.php' method='post'>
				<button type='submit' name='hapus' class='btn btn-danger pull-right'><span class='glyphicon glyphicon-remove-circle'></span> Kosongkan Tabel Bulan Ini</button>
			</form>
			<a href="form.php" class="btn btn-success pull-right">
				<span class="glyphicon glyphicon-upload"></span> Import Data
			</a>
			<form method='post' action='hitung.php'>
			<button type='submit' name='hitung' class='btn btn-primary pull-right'><span class='glyphicon glyphicon-upload'></span> Hitung</button>
			</form>
			
			<form id="form1" name="form1" method="post" action="index2.php">
			<div class="form-group">
       		<label for="s1" class="control-label"></label>
       		<div class="col-sm-1">
        <select name="s1" class="form-control" id="s1">
          <option value="01">01</option>
          <option value="02">02</option>
          <option value="03">03</option>
          <option value="04">04</option>
          <option value="05">05</option>
          <option value="06">06</option>
          <option value="07">07</option>
          <option value="08">08</option>
          <option value="09">09</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
				</select></div>
          <label for="s2" class="control-label"></label>
        	<div class="col-sm-1">
         <select name="s2" class="form-control" id="s2">
          <option value="01">Januari</option>
          <option value="02">Februari</option>
          <option value="03">Maret</option>
          <option value="04">April</option>
          <option value="05">Mei</option>
          <option value="06">Juni</option>
          <option value="07">Juli</option>
          <option value="08">Agustus</option>
          <option value="09">September</option>
          <option value="10">Oktober</option>
          <option value="11">November</option>
          <option value="12">Desember</option>
				</select></div>
        <label for="s3" class="control-label"></label>
        <div class="col-sm-1">
        <select name="s3" class="form-control" id="s3">
          <option value="2011">2011</option>
          <option value="2012">2012</option>
          <option value="2013">2013</option>
          <option value="2014">2014</option>
          <option value="2015">2015</option>
          <option value="2016">2016</option>
          <option value="2017">2017</option>
          <option value="2018">2018</option>
          <option value="2019">2019</option>
          <option value="2020">2020</option>
          <option value="2021">2021</option>
          <option value="2022">2022</option>
          <option value="2023">2023</option>
          <option value="2024">2024</option>
          <option value="2025">2025</option>
          <option value="2026">2026</option>
          <option value="2027">2027</option>
          <option value="2028">2028</option>
		   </select></div>
      <input type="submit" name="button" value="Cari" class="btn btn-primary">
				
      </div>
			</form>
			
			<h3>Data Hasil Import</h3>
			
			<hr>
			
			<!-- Buat sebuah div dan beri class table-responsive agar tabel jadi responsive -->
			<div class="table-responsive">
				<table class="table table-striped width="100%"">
					<tr>
						<th>No</th>
						<th>ID Karyawan</th>
						<th>Nama</th>
						<th>Tanggal</th>
						<th>Jam Masuk</th>
						<th>Jam Istirahat</th>
						<th>Jam Selesai Istirahat</th>
						<th>Jam Pulang</th>
					</tr>
					<?php
					// Load file koneksi.php
					include "koneksi.php";
					
						
						if(isset($_POST['button'])){
					
					
						$tg=$_POST['s1'];
						$bl=$_POST['s2'];
						$th=$_POST['s3'];
					$tgl="$th-$bl-$tg";
					// Buat query untuk menampilkan semua data siswa
					$sql = mysql_query("SELECT * FROM absen where tanggal='$tgl'");
					$sql2 = mysql_query("SELECT * FROM absen JOIN karyawan ON karyawan.id_karyawan=absen.id_karyawan WHERE tanggal='$tgl' AND id_perusahaan=$_SESSION[perusahaan]");
					//$sql->execute();// Eksekusi querynya 
					$no = 1; // Untuk penomoran tabel, di awal set dengan 1
					if($_SESSION['level']=="Super_Admin"){
					while($data = mysql_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
						echo "<tr>";
						echo "<td>".$no."</td>";
						echo "<td>".$data['id_karyawan']."</td>";
						echo "<td>".$data['nama']."</td>";
						echo "<td>".$data['tanggal']."</td>";
						echo "<td>".$data['waktu1']."</td>";
						echo "<td>".$data['waktu2']."</td>";
						echo "<td>".$data['waktu3']."</td>";
						echo "<td>".$data['waktu4']."</td>";
						echo "</tr>";
						
						$no++; }}
							else{
								while($data = mysql_fetch_array($sql2)){ // Ambil semua data dari hasil eksekusi $sql
						echo "<tr>";
						echo "<td>".$no."</td>";
						echo "<td>".$data['id_karyawan']."</td>";
						echo "<td>".$data['nama']."</td>";
						echo "<td>".$data['tanggal']."</td>";
						echo "<td>".$data['waktu1']."</td>";
						echo "<td>".$data['waktu2']."</td>";
						echo "<td>".$data['waktu3']."</td>";
						echo "<td>".$data['waktu4']."</td>";
						echo "</tr>";
						
						$no++;
							}}}
				else{
					$tgl=date('Y-m-d');
						$sql = mysql_query("SELECT * FROM absen WHERE tanggal='$tgl'");
						$sql2 = mysql_query("SELECT * FROM absen JOIN karyawan ON karyawan.id_karyawan=absen.id_karyawan WHERE tanggal='$tgl' AND id_perusahaan=$_SESSION[perusahaan]");
					
					$no = 1;
					if($_SESSION['level']=="Super_Admin"){
					 // Untuk penomoran tabel, di awal set dengan 1
					while($data = mysql_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
						echo "<tr>";
						echo "<td>".$no."</td>";
						echo "<td>".$data['id_karyawan']."</td>";
						echo "<td>".$data['nama']."</td>";
						echo "<td>".$data['tanggal']."</td>";
						echo "<td>".$data['waktu1']."</td>";
						echo "<td>".$data['waktu2']."</td>";
						echo "<td>".$data['waktu3']."</td>";
						echo "<td>".$data['waktu4']."</td>";
						echo "</tr>";
						
						$no++; // Tambah 1 setiap kali looping
					}	}
					else{
						while($data = mysql_fetch_array($sql2)){ // Ambil semua data dari hasil eksekusi $sql
						echo "<tr>";
						echo "<td>".$no."</td>";
						echo "<td>".$data['id_karyawan']."</td>";
						echo "<td>".$data['nama']."</td>";
						echo "<td>".$data['tanggal']."</td>";
						echo "<td>".$data['waktu1']."</td>";
						echo "<td>".$data['waktu2']."</td>";
						echo "<td>".$data['waktu3']."</td>";
						echo "<td>".$data['waktu4']."</td>";
						echo "</tr>";
						
						$no++;
					}}}
					?>
				</table>
				
				<?php
				$telat = mysql_query("SELECT id_karyawan,COUNT(nama), tanggal FROM absen WHERE waktu1 > '08:05:00' GROUP BY tanggal, nama");
				$hitung = mysql_num_rows($telat);
					echo "<tr>";
					echo "<td>".$hitung."</td>";
					echo "<tr>";
				
				?>
				
			</div>
		</div>
	</body>
</html>
