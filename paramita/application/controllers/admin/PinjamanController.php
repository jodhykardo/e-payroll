<?php
use \application\controllers\AdminMainController;
class PinjamanController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('pinjaman');
	  $this->model('karyawan');
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
	  
	   //$c = $_SESSION['perusahaan'];
      $this->template('admin/pinjaman', 'Pinjaman', $data);
   }

//Menampilkan data kategori melalui ajax   
	
	
   public function listData(){
	   
      require_once ROOT."/application/functions/function_action.php";
      require_once ROOT."/application/functions/function_date.php";
	  require_once ROOT."/application/functions/function_rupiah.php";
	  
      //$query = $this->pinjaman->selectJoin(array('karyawan'),"LEFT JOIN", array('karyawan.id_karyawan' => 'pinjaman.id_karyawan'),"","pinjaman.id_pinjaman", "DESC");

	  $query = $this->pinjaman->query("SELECT * FROM pinjaman LEFT JOIN karyawan ON karyawan.id_karyawan=pinjaman.id_karyawan WHERE karyawan.id_perusahaan = $_SESSION[perusahaan]");
	  $query2 = $this->pinjaman->query("SELECT * FROM pinjaman LEFT JOIN karyawan ON karyawan.id_karyawan=pinjaman.id_karyawan");
	  if($_SESSION['level']=="Super_Admin"){
	  $list = $this->pinjaman->getResult($query2);}else{
		  $list = $this->pinjaman->getResult($query);
	  }
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
		 $bx = $li['nm_karyawan'];
         $row = array();
         $row[] = $no;
         $row[] = $li['nm_karyawan'];
		 $row[] = 'Rp '.format_rupiah($li['jml_pinjam']);
		 $row[] = 'Rp '.format_rupiah($li['cicilan']);
		 $row[] = tgl_indonesia($li['tgl_pinjam']);
		 $row[] = $li['keterangan'];
         $row[] = create_action($li['id_pinjaman']);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }
	
	public function edit($id){
      $query = $this->pinjaman->selectWhere(array('id_pinjaman'=>$id));
      $data = $this->pinjaman->getResult($query);
      echo json_encode($data[0]);
   }
	
//Menyimpan data ke database
   public function insert(){
	  $data = array();
      $data['id_karyawan'] = $_POST['id_karyawan'];
	  $data['jml_pinjam'] = $_POST['jml_pinjam'];
	  $data['cicilan'] = $_POST['cicilan'];
	  $data['tgl_pinjam'] = $_POST['tgl_pinjam'];
	  $data['keterangan'] = $_POST['keterangan'];
      $data['tgl_input'] = date('Y-m-d H:i:s');
	  $data['penginput'] = $_SESSION['username'];   
      $simpan = $this->pinjaman->insert($data);
	  $query = $this->karyawan->query("SELECT * FROM karyawan WHERE id_karyawan=$_POST[id_karyawan]");
	  $data2 = mysqli_fetch_array($query);
	   $a = $data2['sisa_hutang'];
	   $b = $_POST['jml_pinjam'];
	   $c = $a + $b;
	  $simpan = $this->karyawan->query("UPDATE karyawan SET sisa_hutang='$c' WHERE id_karyawan=$_POST[id_karyawan]");
	   
   }

//Memperbaharui data pada database
   public function update(){
      $data = array();
      $data['id_karyawan'] = $_POST['id_karyawan'];
	  $data['jml_pinjam'] = $_POST['jml_pinjam'];
	  $data['cicilan'] = $_POST['cicilan'];
	  $data['tgl_pinjam'] = $_POST['tgl_pinjam'];
	  $data['keterangan'] = $_POST['keterangan'];
      $data['tgl_ubah'] = date('Y-m-d H:i:s');
	  $data['pengubah'] = $_SESSION['username'];   
      $id = $_POST['id'];
      $simpan = $this->pinjaman->update($data, array('id_pinjaman'=>$id));
	   
	  $query = $this->karyawan->query("SELECT * FROM karyawan WHERE id_karyawan=$_POST[id_karyawan]");
	  $data2 = mysqli_fetch_array($query);
	   $a = $data2['sisa_hutang'];
	   $b = $_POST['jml_pinjam'];
	   $c = $a + $b;
	  $simpan = $this->karyawan->query("UPDATE karyawan SET sisa_hutang='$c' WHERE id_karyawan=$_POST[id_karyawan]");
	   
   }

//Menghapus data pada database
   public function delete($id){
      $hapus = $this->pinjaman->delete(array('id_pinjaman'=>$id));
	  
	  $simpan = $this->karyawan->query("UPDATE karyawan SET sisa_hutang='0' WHERE id_karyawan=$_POST[id_karyawan]");
   }
}