<?php
use \application\controllers\AdminMainController;
class LaporangajiController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('pinjaman');
	  $this->model('karyawan');
	  $this->model('perusahaan');
	  $this->model('penjualan');
	  $this->model('komponen');
	  $this->model('telat');
   }

//Menampilkan halaman kategori   
   public function index(){
	   $this->model('karyawan');
	   $query = $this->karyawan->selectAll();
	   $data = $this->karyawan->getResult($query); 
	  
	   //$c = $_SESSION['perusahaan'];
      $this->template('admin/laporangaji', 'Laporan Gaji', $data);
   }

//Menampilkan data kategori melalui ajax   
	
	
   public function listData($tanggal){
	   
      require_once ROOT."/application/functions/function_action.php";
      require_once ROOT."/application/functions/function_date.php";
	  require_once ROOT."/application/functions/function_rupiah.php";
	  
	  $tanggal = explode("_", $tanggal);
	  	   
	 
	  $query = $this->karyawan->query("SELECT * FROM perusahaan  LEFT JOIN (karyawan  LEFT JOIN telat ON telat.id_karyawan=karyawan.id_karyawan LEFT JOIN master_gaji ON master_gaji.id_karyawan=karyawan.id_karyawan LEFT JOIN pinjaman ON pinjaman.id_karyawan=karyawan.id_karyawan ) ON perusahaan.id_perusahaan=karyawan.id_perusahaan LEFT JOIN penjualan ON penjualan.id_perusahaan=perusahaan.id_perusahaan WHERE karyawan.id_perusahaan=$_SESSION[perusahaan] AND telat.bulan BETWEEN '$tanggal[0]' AND '$tanggal[1]'");
	  
	  $query2 = $this->karyawan->query("SELECT * FROM karyawan  LEFT JOIN telat ON telat.id_karyawan=karyawan.id_karyawan LEFT JOIN master_gaji ON master_gaji.id_karyawan=karyawan.id_karyawan LEFT JOIN pinjaman ON pinjaman.id_karyawan=karyawan.id_karyawan LEFT JOIN (perusahaan LEFT JOIN penjualan ON penjualan.id_perusahaan=perusahaan.id_perusahaan) ON perusahaan.id_perusahaan=karyawan.id_perusahaan WHERE telat.bulan BETWEEN '$tanggal[0]' AND '$tanggal[1]'");
	  
	  //$query2 = $this->karyawan->query("SELECT * FROM perusahaan LEFT JOIN (karyawan  LEFT JOIN telat ON telat.id_karyawan=karyawan.id_karyawan LEFT JOIN master_gaji ON master_gaji.id_karyawan=karyawan.id_karyawan LEFT JOIN pinjaman ON pinjaman.id_karyawan=karyawan.id_karyawan) ON perusahaan.id_perusahaan=karyawan.id_perusahaan LEFT JOIN penjualan ON penjualan.id_perusahaan=perusahaan.id_perusahaan WHERE telat.bulan BETWEEN '$tanggal[0]' AND '$tanggal[1]'");
	  if($_SESSION['level']=="Super_Admin"){
	  $list = $this->karyawan->getResult($query2);}else{
		  $list = $this->karyawan->getResult($query);
	  }
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
		 $pinjam=$li['cicilan'];
		 $totalgaji=$li['gaji_pokok']+$li['tj_tetap']+($li['hadir']*$li['transportasi'])+$li['prestasi'];
		 $potongan = ($li['telat5']*10000)+($li['telat30']*35000)+($li['telat60']*($li['transportasi']+35000))+($li['telatsiang']*10000)+($li['alpa']*49000)+($li['stss']*35000)+($li['izin']*35000)+($li['izinjk']*7000)+$pinjam;
		 $bonus=$li['bpk'];
		 
		 $total = $totalgaji - $potongan + $bonus;
		  
         $row = array();
         $row[] = $no;
		 $row[] = $li['nm_perusahaan'];
         $row[] = $li['nm_karyawan'];
		 $row[] = 'Rp '.format_rupiah($totalgaji);
		 $row[] = 'Rp '.format_rupiah($potongan);
		 $row[] = 'Rp '.format_rupiah($bonus);
		 $row[] = 'Rp '.format_rupiah($total);
		 //$row[] = $li['keterangan'];
         //$row[] = create_action($li['id_karyawan']);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }

}