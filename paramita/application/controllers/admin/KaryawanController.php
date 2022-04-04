<?php
use \application\controllers\AdminMainController;
class KaryawanController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('karyawan');
	  //$this->model('perusahaan');
   }

//Menampilkan halaman kategori   
   public function index(){
	   $this->model('perusahaan');
	   $query = $this->perusahaan->selectAll();
	   $data = $this->perusahaan->getResult($query);
	   
	   
      $this->template('admin/karyawan', 'Karyawan', $data);
   }

//Menampilkan data kategori melalui ajax   
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
	  require_once ROOT."/application/functions/function_date.php";
      $query = $this->karyawan->selectJoin(array('perusahaan'),"LEFT JOIN", array('karyawan.id_perusahaan' => 'perusahaan.id_perusahaan'),"","karyawan.id_karyawan", "DESC");
      $query2 = $this->karyawan->query("SELECT * FROM karyawan LEFT JOIN perusahaan ON karyawan.id_perusahaan=perusahaan.id_perusahaan WHERE karyawan.id_perusahaan=$_SESSION[perusahaan] ORDER BY karyawan.id_karyawan DESC");
	  if($_SESSION['level']=="Super_Admin"){
	  $list = $this->karyawan->getResult($query);}else{
	  $list = $this->karyawan->getResult($query2);
	  }
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $li['nm_karyawan'];
		 $row[] = $li['tmpt_lahir'];
		 $row[] = tgl_indonesia($li['tgl_lahir']);
		 $row[] = $li['jk'];
		 $row[] = $li['alamatkar'];
		 $row[] = $li['agama'];
		 $row[] = $li['nm_perusahaan'];
		 $row[] = tgl_indonesia($li['tgl_masuk']);
		 $row[] = $li['email'];
		 $row[] = $li['npwp'];
         $row[] = create_action($li['id_karyawan']);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }

//Menampilkan data kategori untuk ditampilkan pada form edit   
   public function edit($id){
      $query = $this->karyawan->selectWhere(array('id_karyawan'=>$id));
      $data = $this->karyawan->getResult($query);
      echo json_encode($data[0]);
   }

//Menyimpan data ke database
   public function insert(){
      $data = array();
      $data['nm_karyawan'] = $_POST['nm_karyawan'];
	  $data['tmpt_lahir'] = $_POST['tmpt_lahir'];
	  $data['tgl_lahir'] = $_POST['tgl_lahir'];
      $data['jk'] = $_POST['jk'];
	  $data['alamatkar'] = $_POST['alamat'];
	  $data['agama'] = $_POST['agama'];
	  $data['id_perusahaan'] = $_POST['nm_perusahaan'];
	  $data['tgl_masuk'] = $_POST['tgl_masuk'];
	  $data['email'] = $_POST['email'];
	  $data['npwp'] = $_POST['npwp'];
	  $data['tgl_input'] = date('Y-m-d H:i:s');
	  $data['penginput'] = $_SESSION['username'];
      $simpan = $this->karyawan->insert($data);
   }

//Memperbaharui data pada database
   public function update(){
      $data = array();
      $data['nm_karyawan'] = $_POST['nm_karyawan'];
	  $data['tmpt_lahir'] = $_POST['tmpt_lahir'];
	  $data['tgl_lahir'] = $_POST['tgl_lahir'];
      $data['jk'] = $_POST['jk'];
	  $data['alamatkar'] = $_POST['alamat'];
	  $data['agama'] = $_POST['agama'];
	  $data['id_perusahaan'] = $_POST['nm_perusahaan'];
	  $data['tgl_masuk'] = $_POST['tgl_masuk'];
	  $data['email'] = $_POST['email'];
	  $data['npwp'] = $_POST['npwp'];
	  $data['tgl_ubah'] = date('Y-m-d H:i:s');
	  $data['pengubah'] = $_SESSION['username'];
	   
      $id = $_POST['id'];
      $simpan = $this->karyawan->update($data, array('id_karyawan'=>$id));
   }

//Menghapus data pada database
   public function delete($id){
      $hapus = $this->karyawan->delete(array('id_karyawan'=>$id));
   }
}