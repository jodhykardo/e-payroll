<?php
use \application\controllers\AdminMainController;
class PenjualanController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('penjualan');
	  //$this->model('perusahaan');
	  $this->model('merk');
	   
   }

//Menampilkan halaman kategori   
   public function index(){
	   $this->model('perusahaan');
	   $query = $this->perusahaan->selectAll();
	   $data = $this->perusahaan->getResult($query);
	   
       $this->template('admin/penjualan', 'Penjualan', $data);
	  //$this->template('admin/penjualan', 'Penjualan', $data2);
   }

//Menampilkan data kategori melalui ajax   
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
	  require_once ROOT."/application/functions/function_date.php";
	  require_once ROOT."/application/functions/function_rupiah.php";
      //$query = $this->penjualan->selectJoin(array('perusahaan', 'merk'),"LEFT JOIN", array('penjualan.id_perusahaan'=> 'perusahaan.id_perusahaan', 'penjualan.id_merk' => 'merk.id_merk'),"","penjualan.id_penjualan", "DESC");
      $query = $this->penjualan->query("SELECT * FROM penjualan LEFT JOIN perusahaan ON penjualan.id_perusahaan=perusahaan.id_perusahaan LEFT JOIN merk ON penjualan.id_merk=merk.id_merk");
	  $query2 = $this->penjualan->query("SELECT * FROM penjualan LEFT JOIN merk ON penjualan.id_merk=merk.id_merk LEFT JOIN perusahaan ON penjualan.id_perusahaan=perusahaan.id_perusahaan WHERE perusahaan.id_perusahaan=$_SESSION[perusahaan]");
	  if($_SESSION['level']=="Super_Admin"){
	  $list = $this->penjualan->getResult($query);}else{
	  $list = $this->penjualan->getResult($query2);
	  }
      $data = array();
      $no = 0;
      foreach($list as $li){
		 //$subtotal = $li['total_penjualan'] * ($li['bonus'] / 100);
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $li['nm_perusahaan'];
		 $row[] = $li['merk'];
		 $row[] = 'Rp. '.format_rupiah($li['total_penjualan']);
		 $row[] = $li['bonus'].'%';
		 $row[] = 'Rp. '.format_rupiah($li['total_bonus']);
		 $row[] = bulantahun($li['bulan_bonus']);
         $row[] = create_action($li['id_penjualan']);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }
	
//Menampilkan pilihan Merk
   public function datalink(){
	   $text="";
	   $query = $this->merk->SelectAll();
	   $list = $this->merk->getResult($query);
	   foreach($list as $li){
		   $text .= "<option value='$li[id_merk]'> $li[merk] </option>";
	   }
	   echo $text;
   }

//Menampilkan data kategori untuk ditampilkan pada form edit   
   public function edit($id){
      $query = $this->penjualan->selectWhere(array('id_penjualan'=>$id));
      $data = $this->penjualan->getResult($query);
      echo json_encode($data[0]);
   }

//Menyimpan data ke database
   public function insert(){
      //$query->penjualan->query("SELECT * FROM PENJUALAN");
	  //$list->penjualan->getResult($query);
	   $a = $_POST['total_penjualan'];
	   $b = $_POST['bonus'];
	   $c = $a * ($b / 100);
	   
	  $data = array();
      $data['id_perusahaan'] = $_POST['id_perusahaan'];
	  $data['id_merk'] = $_POST['id_merk'];
	  $data['total_penjualan'] = $_POST['total_penjualan'];
	  $data['bonus'] = $_POST['bonus'];
	  $data['total_bonus'] = $c;
	  $data['bulan_bonus'] = $_POST['bulan_bonus'];
	  $data['tgl_input'] = date('Y-m-d H:i:s');
	  $data['penginput'] = $_SESSION['username'];
         
      $simpan = $this->penjualan->insert($data);
   }

//Memperbaharui data pada database
   public function update(){
	   $a = $_POST['total_penjualan'];
	   $b = $_POST['bonus'];
	   $c = $a * ($b / 100);
      $data = array();
      $data['id_perusahaan'] = $_POST['id_perusahaan'];
	  $data['id_merk'] = $_POST['id_merk'];
	  $data['total_penjualan'] = $_POST['total_penjualan'];
	  $data['bonus'] = $_POST['bonus'];
	  $data['total_bonus'] = $c;
	  $data['bulan_bonus'] = $_POST['bulan_bonus'];
	  $data['tgl_ubah'] = date('Y-m-d H:i:s');
	  $data['pengubah'] = $_SESSION['username'];
	   
      $id = $_POST['id'];
      $simpan = $this->penjualan->update($data, array('id_penjualan'=>$id));
   }

//Menghapus data pada database
   public function delete($id){
      $hapus = $this->penjualan->delete(array('id_penjualan'=>$id));
   }
}