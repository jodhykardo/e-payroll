<?php
use \application\controllers\AdminMainController;
class TidakhadirController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('tidakhadir');
	  $this->model('karyawan');
   }

//Menampilkan halaman kategori   
   public function index(){
	   $this->model('karyawan');
	   $a = $_SESSION['perusahaan'];
	   if($_SESSION['level']=="Super_Admin"){
	   $query = $this->karyawan->query("SELECT * FROM karyawan WHERE cuti > 0");
	   $data = $this->karyawan->getResult($query);
	   }
	   else{
	   $query = $this->karyawan->query("SELECT * FROM karyawan WHERE id_perusahaan=$_SESSION[perusahaan] AND cuti > 0");
	   $data = $this->karyawan->getResult($query);
	   } 
	  
	   
	   
      $this->template('admin/tidakhadir', 'tidakhadir', $data);
   }

//Menampilkan data kategori melalui ajax   
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
	  require_once ROOT."/application/functions/function_date.php";
      $query = $this->tidakhadir->selectJoin(array('karyawan'), "LEFT JOIN", array('karyawan.id_karyawan'=>'tidakhadir.id_karyawan'));
      $query2 = $this->tidakhadir->query("SELECT * FROM tidakhadir LEFT JOIN karyawan ON karyawan.id_karyawan=tidakhadir.id_karyawan WHERE karyawan.id_perusahaan=$_SESSION[perusahaan]");
	  if($_SESSION['level']=="Super_Admin"){
	  $list = $this->tidakhadir->getResult($query);}else{
	  $list = $this->tidakhadir->getResult($query2);
	  }
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $li['nm_karyawan'];
		 $row[] = $li['jenis_tidakhadir'];
		 $row[] = tgl_indonesia($li['tgl_tidakhadir']);
		 $row[] = $li['alasan'];
		 $row[] = $li['suratdokter'];
		 $row[] = $li['waktu1'];
		 $row[] = $li['waktu2'];
         $row[] = create_action($li['id_tidakhadir']);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }

//Menampilkan data kategori untuk ditampilkan pada form edit   
   public function edit($id){
      $query = $this->tidakhadir->selectWhere(array('id_tidakhadir'=>$id));
      $data = $this->tidakhadir->getResult($query);
      echo json_encode($data[0]);
   }

//Menyimpan data ke database
   public function insert(){
	  
      $data = array();
      $data['id_karyawan'] = $_POST['id_karyawan'];
	  $data['jenis_tidakhadir'] = $_POST['jenis_tidakhadir'];
	  $data['tgl_tidakhadir'] = $_POST['tgl_tidakhadir'];
      $data['alasan'] = $_POST['alasan'];
	  $data['suratdokter'] = $_POST['suratdokter'];
	  $data['waktu1'] = $_POST['waktu1'];
	  $data['waktu2'] = $_POST['waktu2'];
	  $data['tgl_upload'] = date('Y-m-d H:i:s');
	  $data['pengupload'] = $_SESSION['username'];
      $simpan = $this->tidakhadir->insert($data);
	   
	  if($_POST['jenis_tidakhadir']=="Cuti"){
		  $query = $this->karyawan->query("SELECT * FROM karyawan WHERE id_karyawan=$_POST[id_karyawan]");
		  $data2 = mysqli_fetch_array($query);
	  $cuti=$data2['cuti'];
	  $input=$cuti-1;
	  //$data['cuti'] = $input;
	  $simpan = $this->karyawan->query("UPDATE karyawan SET cuti='$input' WHERE id_karyawan=$_POST[id_karyawan]");
	  }
   }

//Memperbaharui data pada database
   public function update(){
	  
      $data = array();
      $data['id_karyawan'] = $_POST['id_karyawan'];
	  $data['jenis_tidakhadir'] = $_POST['jenis_tidakhadir'];
	  $data['tgl_tidakhadir'] = $_POST['tgl_tidakhadir'];
      $data['alasan'] = $_POST['alasan'];
	  $data['suratdokter'] = $_POST['suratdokter'];
	  $data['waktu1'] = $_POST['waktu1'];
	  $data['waktu2'] = $_POST['waktu2'];
	  $data['tgl_ubah'] = date('Y-m-d H:i:s');
	  $data['pengubah'] = $_SESSION['username'];
	   
      $id = $_POST['id'];
      $simpan = $this->tidakhadir->update($data, array('id_tidakhadir'=>$id));
   }

//Menghapus data pada database
   public function delete($id){
      $hapus = $this->tidakhadir->delete(array('id_tidakhadir'=>$id));
   }
}