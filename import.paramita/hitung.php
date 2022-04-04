<html>
	<title> TEST </title>
	<head></head>
	<body>
<table border="1">
<tbody>
<?php
include "koneksi.php";

	
function datediff($tgl1, $tgl2){
$tgl1 = strtotime($tgl1);
$tgl2 = strtotime($tgl2);
$diff_secs = abs($tgl1 - $tgl2);
$base_year = min(date("Y", $tgl1), date("Y", $tgl2));
$diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
return array( "years" => date("Y", $diff) - $base_year, "months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1, "months" => date("n", $diff) - 1, "days_total" => floor($diff_secs / (3600 * 24)), "days" => date("j", $diff) - 1, "hours_total" => floor($diff_secs / 3600), "hours" => date("G", $diff), "minutes_total" => floor($diff_secs / 60), "minutes" => (int) date("i", $diff), "seconds_total" => $diff_secs, "seconds" => (int) date("s", $diff) );
}
    
	$blnini = date('2018-01-25');
	$blnini2 = date('Y-m-26');
	$blnlalu = date('2017-12-26');
	//$blnlalu = date('Y-m-d', strtotime('-1 month', strtotime( $blnini )));
	$sqlcek = mysql_query("SELECT * FROM telat WHERE bulan='$blnini2'");
	$hitung = mysql_num_rows($sqlcek);
	if($hitung>0){
		echo "<script>alert('Bulan Ini Sudah Dihitung! Jika Terjadi Kesalahan Silahkan Kosongkan Tabel Perhitungan Dulu');javascript:history.go(-1)</script>";
        include "index2.php"; exit;
	}
	else{
	
if(isset($_POST['hitung'])){ 
	date_default_timezone_set("Asia/Jakarta");
	
	$sqlperusahaan = mysql_query("SELECT * FROM perusahaan ORDER BY id_perusahaan");
		while($dataperusahaan = mysql_fetch_array($sqlperusahaan)){
			$k = $dataperusahaan['id_perusahaan'];
			$sqlkaryawan = mysql_query("SELECT * FROM karyawan WHERE id_perusahaan='$k'");
			$jmlkaryawan = mysql_num_rows($sqlkaryawan);
			
			$updatekaryawan = mysql_query("UPDATE penjualan SET jml_karyawan='$jmlkaryawan' WHERE id_perusahaan='$k' AND bulan_bonus='$blnlalu'");
			
			$sqlbonus = mysql_query("SELECT * FROM penjualan WHERE id_perusahaan='$k' AND bulan_bonus='$blnlalu'");
			while($databonus = mysql_fetch_array($sqlbonus)){
			$bonus = $databonus['total_bonus'];
			$jumlah = $databonus['jml_karyawan'];
			$bb = $bonus / $jmlkaryawan;
			$simpanbonus = mysql_query("UPDATE penjualan SET bpk='$bb' WHERE id_perusahaan='$k'");
			}
		}
	
	$sql = mysql_query("SELECT * FROM karyawan ORDER BY id_karyawan");
		while($data = mysql_fetch_array($sql)){ 
			$a = $data['id_karyawan'];
			
			$sql5 = mysql_query("SELECT * FROM absen WHERE id_karyawan='$a' AND waktu1 BETWEEN '08:05:00' AND '08:29:00' AND tanggal BETWEEN '$blnlalu' AND '$blnini'");
			$jml5 = mysql_num_rows($sql5);
			$simpan5 = mysql_query("INSERT INTO telat(id_karyawan,bulan,telat5) VALUES('$a','$blnini','$jml5')");
		
			
			$sql30 = mysql_query("SELECT * FROM absen WHERE id_karyawan='$a' AND waktu1 BETWEEN '08:30:00' AND '09:00:00' AND tanggal BETWEEN '$blnlalu' AND '$blnini'");
			$jml30 = mysql_num_rows($sql30);
			$simpan30 = mysql_query("UPDATE telat SET telat30='$jml30' WHERE id_karyawan=$a AND bulan='$blnini'");
			
			
			$sql60 = mysql_query("SELECT * FROM absen WHERE id_karyawan='$a' AND waktu1 > '09:00:00' AND tanggal BETWEEN '$blnlalu' AND '$blnini'");
			$jml60 = mysql_num_rows($sql60);
			$simpan60 = mysql_query("UPDATE telat SET telat30='$jml60' WHERE id_karyawan=$a AND bulan='$blnini'");
		
			
			$sqlsiang = mysql_query("SELECT * from absen WHERE id_karyawan='$a' AND timestampdiff(minute, waktu2, waktu3) > 60 AND tanggal BETWEEN '$blnlalu' AND '$blnini'");
			$jmlsiang = mysql_num_rows($sqlsiang);
			$simpansiang = mysql_query("UPDATE telat SET telatsiang='$jmlsiang' WHERE id_karyawan=$a AND bulan='$blnini'");
			
			
			$sqlalpa = mysql_query("SELECT * from absen WHERE waktu1 is null AND waktu2 IS NULL AND waktu3 IS NULL AND waktu4 IS NULL AND id_karyawan='$a' AND tanggal BETWEEN '$blnlalu' AND '$blnini'");
			$dataalpa = mysql_num_rows($sqlalpa);	
			
			$sqlminggu = mysql_query("SELECT * from absen WHERE id_karyawan='$a' AND DAYNAME(tanggal)='sunday'");
			$dataminggu = mysql_num_rows($sqlminggu);
		
			$tglmerah = mysql_query("SELECT * FROM tanggalmerah WHERE tgl BETWEEN '$blnlalu' AND '$blnini'");
			$datatglmerah = mysql_num_rows($tglmerah);
			
			$tglcuti = mysql_query("SELECT * FROM tidakhadir WHERE id_karyawan='$a' AND jenis_tidakhadir='Cuti' AND tgl_tidakhadir BETWEEN '$blnlalu' AND '$blnini'");
			$datacuti = mysql_num_rows($tglcuti);
			
			$total = $dataalpa - $datatglmerah - $datacuti - $dataminggu;
			
			$simpanalpa = mysql_query("UPDATE telat SET alpa='$total' WHERE id_karyawan=$a AND bulan='$blnini'");
			
			
			$sqlsakit = mysql_query("SELECT * FROM tidakhadir WHERE id_karyawan='$a' AND jenis_tidakhadir='Sakit' AND suratdokter='' AND tgl_tidakhadir BETWEEN '$blnlalu' AND '$blnini'");
			$datasakit = mysql_num_rows($sqlsakit);
			$simpansakit = mysql_query("UPDATE telat SET stss='$datasakit' WHERE id_karyawan=$a AND bulan='$blnini'");
			
			
			$sqlizin = mysql_query("SELECT * FROM tidakhadir WHERE id_karyawan='$a' AND jenis_tidakhadir='Izin' AND waktu1='00:00:00' AND tgl_tidakhadir BETWEEN '$blnlalu' AND '$blnini'");
			$dataizin = mysql_num_rows($sqlizin);
			$simpanizin = mysql_query("UPDATE telat SET izin='$dataizin' WHERE id_karyawan=$a AND bulan='$blnini'");
			
			
			$sqlizinjk = mysql_query("SELECT * FROM tidakhadir WHERE id_karyawan='$a' AND jenis_tidakhadir='Izin' AND tgl_tidakhadir BETWEEN '$blnlalu' AND '$blnini'");
			while($dataizinjk = mysql_fetch_array($sqlizinjk)){
			$waktukeluar = $dataizinjk['waktu1'];
			$waktumasuk = $dataizinjk['waktu2'];
			$selisih = datediff($waktukeluar, $waktumasuk);
			$simpanizinjk = mysql_query("UPDATE telat SET izinjk='$selisih' WHERE id_karyawan='$a'");
			}
			
			
			
			$sqlprestasi = mysql_query("SELECT * FROM telat WHERE id_karyawan='$a'");
			while($dataprestasi = mysql_fetch_array($sqlprestasi)){
				$alpa = $dataprestasi['alpa'];
				$sakit = $dataprestasi['stss'];
				$x = $alpa + $sakit;
				
				if($x > 5){
					$h = 0;
				}
				else
				if($x >3 && $x < 5){
					$h = 200000;
				}
				else
				if($x < 3){
					$h = 400000;
				}
				
				$ambilprestasi = mysql_query("SELECT * FROM telat WHERE id_karyawan='$a'");
				$prestasi = mysql_fetch_array($ambilprestasi);
				$g = $prestasi['prestasi'];
				$totalprestasi = $h + $g;
				
				$simpanprestasi = mysql_query("UPDATE telat SET prestasi='$totalprestasi' WHERE id_karyawan='$a'");
			}
			
			$sqlhadir = mysql_query("SELECT * FROM absen WHERE id_karyawan='$a' AND waktu1 IS NOT NULL");
			$hadir = mysql_num_rows($sqlhadir);
			$simpanhadir = mysql_query("UPDATE telat SET hadir='$hadir' WHERE id_karyawan='$a' AND bulan='$blnini'");
			
?>
			<tr>
				<td><?php echo "$a" ?> </td>
				<td><?php echo "$jml5" ?></td>
				<td><?php echo "$jml30" ?></td>
				<td><?php echo "$jmlsiang" ?></td>
				<td><?php echo "$total" ?></td>
				<td><?php echo "$datasakit" ?></td>
				<td><?php echo "$dataizin" ?></td>
				<td><?php echo "$selisih" ?></td>
				<td><?php echo "$totalprestasi" ?></td>				
			</tr> <?php
		}
	
			echo "<script>alert('Absen Sudah Dihitung! Silahkan Cek Laporan Gaji Anda!');javascript:history.go(-1)</script>";
        	include "index2.php"; exit;
			}
		
	}
?>
			</tbody>
		</table>
	</body>
</html>