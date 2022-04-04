<?php
use \application\controllers\AdminMainController;
class PerusahaanController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('perusahaan');
   }

//Menampilkan halaman kategori   
   public function index(){
      $this->template('admin/perusahaan', 'Perusahaan');
   }

//Menampilkan data kategori melalui ajax   
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
      $query = $this->perusahaan->selectAll("id_perusahaan","DESC");
      $list = $this->perusahaan->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $li['nm_perusahaan'];
		  $row[]=$li['alamat'];
         $row[] = create_action($li['id_perusahaan']);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }

//Menampilkan data kategori untuk ditampilkan pada form edit   
   public function edit($id){
      $query = $this->perusahaan->selectWhere(array('id_perusahaan'=>$id));
      $data = $this->perusahaan->getResult($query);
      echo json_encode($data[0]);
   }

//Menyimpan data ke database
   public function insert(){
      $data = array();
      $data['nm_perusahaan'] = $_POST['perusahaan'];
	   $data['alamat'] = $_POST['alamat'];
         
      $simpan = $this->perusahaan->insert($data);
   }

//Memperbaharui data pada database
   public function update(){
      $data = array();
      $data['nm_perusahaan'] = $_POST['perusahaan'];
      $data['alamat'] = $_POST['alamat'];
      $id = $_POST['id'];
      $simpan = $this->perusahaan->update($data, array('id_perusahaan'=>$id));
   }

//Menghapus data pada database
   public function delete($id){
      $hapus = $this->perusahaan->delete(array('id_perusahaan'=>$id));
   }
}