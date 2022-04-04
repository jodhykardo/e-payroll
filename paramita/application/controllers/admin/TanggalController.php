<?php
use \application\controllers\AdminMainController;
class TanggalController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('tanggal');
   }

//Menampilkan halaman kategori   
   public function index(){
      $this->template('admin/tanggal', 'Tanggal Merah');
   }

//Menampilkan data kategori melalui ajax   
   public function listData(){
      require_once ROOT."/application/functions/function_action.php";
	  require_once ROOT."/application/functions/function_date.php";
      $query = $this->tanggal->selectAll("id_tanggalmerah","DESC");
      $list = $this->tanggal->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = tgl_indonesia($li['tgl']);
		 $row[] = $li['hari'];
         $row[] = create_action($li['id_tanggalmerah']);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }

//Menampilkan data kategori untuk ditampilkan pada form edit   
   public function edit($id){
      $query = $this->tanggal->selectWhere(array('id_tanggalmerah'=>$id));
      $data = $this->tanggal->getResult($query);
      echo json_encode($data[0]);
   }

//Menyimpan data ke database
   public function insert(){
      $data = array();
      $data['tgl'] = $_POST['tgl'];
	  $data['hari'] = $_POST['hari'];
         
      $simpan = $this->tanggal->insert($data);
   }

//Memperbaharui data pada database
   public function update(){
      $data = array();
      $data['tgl'] = $_POST['tgl'];
      $data['hari'] = $_POST['hari'];
      $id = $_POST['id'];
      $simpan = $this->tanggal->update($data, array('id_tanggalmerah'=>$id));
   }

//Menghapus data pada database
   public function delete($id){
      $hapus = $this->tanggal->delete(array('id_tanggalmerah'=>$id));
   }
}