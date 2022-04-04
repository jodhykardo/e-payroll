<?php
use \application\controllers\AdminMainController;
class UserController extends AdminMainController{
   function __construct(){
      parent::__construct();
      $this->model('admin');
   }
	
   public function index(){
      $query = $this->admin->selectAll();
      $data = $this->admin->getResult($query);
	   
	  $this->model('perusahaan');
	   $query = $this->perusahaan->selectAll();
	   $data = $this->perusahaan->getResult($query);
	   
      $this->template('admin/user', 'User', $data);
   }
	
	public function listData(){
      require_once ROOT."/application/functions/function_action.php";
	  require_once ROOT."/application/functions/function_date.php";
      $query = $this->admin->selectJoin(array('perusahaan'),"LEFT JOIN", array('admin.id_perusahaan' => 'perusahaan.id_perusahaan'),"","username", "DESC");
		$list = $this->admin->getResult($query);
      $data = array();
      $no = 0;
      foreach($list as $li){
         $no ++;
         $row = array();
         $row[] = $no;
         $row[] = $li['username'];
		 $row[] = $li['nama'];
		 $row[] = $li['level'];
		 $row[] = $li['nm_perusahaan'];
         $row[] = create_action($li['username'],false);
         $data[] = $row;
      }
      
      $output = array("data" => $data);
      echo json_encode($output);
   }
	
   public function insert(){
	   $data = array();
	   $data['username'] = $_POST['username'];
	   $data['password'] = md5($_POST['password']);
	   $data['nama'] = $_POST['nama'];
	   $data['level'] = $_POST['level'];
	   $data['id_perusahaan'] = $_POST['nm_perusahaan'];
	   
	   $simpan = $this->admin->insert($data);
   }
	
   public function delete($id){
      $hapus = $this->admin->delete(array('username'=>$id));
   }
}
   
  /* public function update(){
      $data = array();
      $data['password'] = md5($_POST['baru']);
      $lama = md5($_POST['lama']);
         
      $query= $this->admin->selectWhere(array('username'=>$_SESSION['username']));
      $cek = $this->admin->getResult($query);
      
      if($cek[0]['password'] != $lama){
          echo "Password lama salah!";
      }else{
          $simpan = $this->admin->update($data);
         if($simpan) {echo "success";
			session_destroy();
				 }	 
      }
   }*/
