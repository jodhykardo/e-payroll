<?php
use \application\controllers\AdminMainController;
class MerkController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('merk');
   }

//Menampilkan halaman kategori   
   public function index(){
      $this->template('admin/merk', 'Merk');
   }

//Menampilkan data kategori melalui ajax   
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
      $query = $this->merk->selectAll("id_merk","DESC");
      $list = $this->merk->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $li['merk'];
		 //$row[]=$li['tgl'];
         $row[] = create_action($li['id_merk']);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }

//Menampilkan data kategori untuk ditampilkan pada form edit   
   public function edit($id){
      $query = $this->merk->selectWhere(array('id_merk'=>$id));
      $data = $this->merk->getResult($query);
      echo json_encode($data[0]);
   }

//Menyimpan data ke database
   public function insert(){
      $data = array();
      $data['merk'] = $_POST['merk'];
	  //$data['tgl'] = $_POST['tgl'];
         
      $simpan = $this->merk->insert($data);
   }

//Memperbaharui data pada database
   public function update(){
      $data = array();
      $data['merk'] = $_POST['merk'];
      //$data['persen'] = $_POST['persen'];
      $id = $_POST['id'];
      $simpan = $this->merk->update($data, array('id_merk'=>$id));
   }

//Menghapus data pada database
   public function delete($id){
      $hapus = $this->merk->delete(array('id_merk'=>$id));
   }
}