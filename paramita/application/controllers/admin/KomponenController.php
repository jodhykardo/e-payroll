<?php
use \application\controllers\AdminMainController;
class KomponenController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('komponen');
	  $this->model('karyawan');
	  //$this->model('merk');
	   
   }

//Menampilkan halaman kategori   
   public function index(){
	   $this->model('karyawan');
	   $a = $_SESSION['perusahaan'];
	   if($_SESSION['level']=="Super_Admin"){
	   $query = $this->karyawan->selectAll();
	   $data = $this->karyawan->getResult($query);
	   }
	   else{
	   $query = $this->karyawan->selectWhere(array('id_perusahaan' => $a));
	   $data = $this->karyawan->getResult($query);
	   }
	   
       $this->template('admin/komponen', 'komponen', $data);
	  //$this->template('admin/penjualan', 'Penjualan', $data2);
   }

//Menampilkan data kategori melalui ajax   
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
	  require_once ROOT."/application/functions/function_date.php";
	  require_once ROOT."/application/functions/function_rupiah.php";
      //$query = $this->penjualan->selectJoin(array('perusahaan', 'merk'),"LEFT JOIN", array('penjualan.id_perusahaan'=> 'perusahaan.id_perusahaan', 'penjualan.id_merk' => 'merk.id_merk'),"","penjualan.id_penjualan", "DESC");
      $query = $this->komponen->query("SELECT * FROM master_gaji LEFT JOIN karyawan ON master_gaji.id_karyawan=karyawan.id_karyawan LEFT JOIN perusahaan ON perusahaan.id_perusahaan=karyawan.id_perusahaan ORDER BY master_gaji.id_mastergaji DESC");
	  $query2 = $this->komponen->query("SELECT * FROM karyawan LEFT JOIN master_gaji ON master_gaji.id_karyawan=karyawan.id_karyawan LEFT JOIN perusahaan ON karyawan.id_perusahaan=perusahaan.id_perusahaan WHERE karyawan.id_perusahaan=$_SESSION[perusahaan] ORDER BY master_gaji.id_mastergaji DESC");
	  if($_SESSION['level']=="Super_Admin"){
	  $list = $this->komponen->getResult($query);}else{
	  $list = $this->komponen->getResult($query2);
	  }
      $data = array();
      $no = 0;
      foreach($list as $li){
		 //$subtotal = $li['total_penjualan'] * ($li['bonus'] / 100);
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $li['nm_karyawan'];
		 $row[] = $li['nm_perusahaan'];
		 $row[] = 'Rp. '.format_rupiah($li['gaji_pokok']);
		 $row[] = 'Rp. '.format_rupiah($li['tj_tetap']);
		 $row[] = 'Rp. '.format_rupiah($li['transportasi']);
		 $row[] = 'Rp. '.format_rupiah($li['prestasi2']);
         $row[] = create_action($li['id_mastergaji']);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }
	
//Menampilkan pilihan Merk
 //  public function datalink(){
 //	   $text="";
 //	   $query = $this->merk->SelectAll();
 //	   $list = $this->merk->getResult($query);
 //	   foreach($list as $li){
 //		   $text .= "<option value='$li[id_merk]'> $li[merk] </option>";
 //	   }
 //	   echo $text;
 //  }

//Menampilkan data kategori untuk ditampilkan pada form edit   
   public function edit($id){
      $query = $this->komponen->selectWhere(array('id_mastergaji'=>$id));
      $data = $this->komponen->getResult($query);
      echo json_encode($data[0]);
   }

//Menyimpan data ke database
   public function insert(){
      //$query->penjualan->query("SELECT * FROM PENJUALAN");
	  //$list->penjualan->getResult($query);
	  // $a = $_POST['total_penjualan'];
	  // $b = $_POST['bonus'];
	  // $c = $a * ($b / 100);
	   
	  $data = array();
      $data['id_karyawan'] = $_POST['id_karyawan'];
	  $data['gaji_pokok'] = $_POST['gaji_pokok'];
	  $data['tj_tetap'] = $_POST['tj_tetap'];
	  $data['transportasi'] = $_POST['transportasi'];
	  $data['prestasi2'] = $_POST['prestasi2'];
	  $data['tgl_input'] = date('Y-m-d H:i:s');
	  $data['penginput'] = $_SESSION['username'];
         
      $simpan = $this->komponen->insert($data);
   }

//Memperbaharui data pada database
   public function update(){
	  // $a = $_POST['total_penjualan'];
	  // $b = $_POST['bonus'];
	  // $c = $a * ($b / 100);
      $data = array();
      $data['id_karyawan'] = $_POST['id_karyawan'];
	  $data['gaji_pokok'] = $_POST['gaji_pokok'];
	  $data['tj_tetap'] = $_POST['tj_tetap'];
	  $data['transportasi'] = $_POST['transportasi'];
	  $data['prestasi2'] = $_POST['prestasi2'];
	  $data['tgl_ubah'] = date('Y-m-d H:i:s');
	  $data['pengubah'] = $_SESSION['username'];
	   
      $id = $_POST['id'];
      $simpan = $this->komponen->update($data, array('id_mastergaji'=>$id));
   }

//Menghapus data pada database
   public function delete($id){
      $hapus = $this->komponen->delete(array('id_mastergaji'=>$id));
   }
}