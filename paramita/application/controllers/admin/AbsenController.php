<?php
use \application\controllers\AdminMainController;
class AbsenController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('absen');
	  $this->model('perusahaan');
	  $this->model('karyawan');
   }

//Menampilkan halaman kategori   
   public function index(){
	   
      $this->template('admin/absen', 'Data Absen');
   }

//Menampilkan data kategori melalui ajax   
   public function listData($tanggal){
	  require_once ROOT."/application/functions/function_date.php";
	   
	  $tanggal = explode("_", $tanggal);
	   
      $query = $this->absen->query("SELECT * FROM karyawan LEFT JOIN perusahaan ON karyawan.id_perusahaan=perusahaan.id_perusahaan LEFT JOIN absen ON karyawan.id_karyawan=absen.id_karyawan WHERE absen.tanggal BETWEEN '$tanggal[0]' AND '$tanggal[1]'");
	   
      $query2 = $this->absen->query("SELECT * FROM karyawan LEFT JOIN perusahaan ON karyawan.id_perusahaan=perusahaan.id_perusahaan LEFT JOIN absen ON karyawan.id_karyawan=absen.id_karyawan WHERE karyawan.id_perusahaan='$_SESSION[perusahaan]' AND absen.tanggal BETWEEN '$tanggal[0]' AND '$tanggal[1]'");
	   
	  if($_SESSION['level']=="Super_Admin"){
	  $list = $this->absen->getResult($query);}else{
	  $list = $this->absen->getResult($query2);
	  }
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
		 $row[] = $li['nm_perusahaan'];
         $row[] = $li['nm_karyawan'];
		 $row[] = tgl_indonesia($li['tanggal']);
		 $row[] = $li['waktu1'];
		 $row[] = $li['waktu2'];
		 $row[] = $li['waktu3'];
		 $row[] = $li['waktu4'];
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }
}
