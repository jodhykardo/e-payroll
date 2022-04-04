<?php
use \application\controllers\AdminMainController;
class LaporanabsenController extends AdminMainController{
   function __construct(){
      parent::__construct();
	  $this->model('karyawan');
	  $this->model('perusahaan');
	  $this->model('telat');
   }

//Menampilkan halaman kategori   
   public function index(){
	   $this->model('karyawan');
	   $query = $this->karyawan->selectAll();
	   $data = $this->karyawan->getResult($query); 
	  
	   //$c = $_SESSION['perusahaan'];
      $this->template('admin/laporanabsen', 'Laporan Absen', $data);
   }

//Menampilkan data kategori melalui ajax   
	
	
   public function listData($tanggal){
	   
      require_once ROOT."/application/functions/function_action.php";
      require_once ROOT."/application/functions/function_date.php";
	  require_once ROOT."/application/functions/function_rupiah.php";
	  
	  $tanggal = explode("_", $tanggal);
	  
	   
	  $query = $this->karyawan->query("SELECT * FROM karyawan LEFT JOIN perusahaan ON perusahaan.id_perusahaan=karyawan.id_perusahaan LEFT JOIN telat ON telat.id_karyawan=karyawan.id_karyawan WHERE karyawan.id_perusahaan=$_SESSION[perusahaan] AND telat.bulan BETWEEN '$tanggal[0]' AND '$tanggal[1]'");
	  $query2 = $this->karyawan->query("SELECT * FROM karyawan LEFT JOIN perusahaan ON perusahaan.id_perusahaan=karyawan.id_perusahaan LEFT JOIN telat ON telat.id_karyawan=karyawan.id_karyawan WHERE telat.bulan BETWEEN '$tanggal[0]' AND '$tanggal[1]'");
	  if($_SESSION['level']=="Super_Admin"){
	  $list = $this->karyawan->getResult($query2);}else{
		  $list = $this->karyawan->getResult($query);
	  }
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
		  
         $row = array();
         $row[] = $no;
		 $row[] = $li['nm_perusahaan'];
         $row[] = $li['nm_karyawan'];
		 $row[] = $li['telat5'];
		 $row[] = $li['telat30'];
		 $row[] = $li['telat60'];
		 $row[] = $li['telatsiang'];
		 $row[] = $li['alpa'];
		 $row[] = $li['stss'];
		 $row[] = $li['izin'];
		 $row[] = $li['hadir'];
		 //$row[] = $li['keterangan'];
         //$row[] = create_action($li['id_karyawan']);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }

}