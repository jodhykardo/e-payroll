<?php
class AdminController extends Controller{

//Method untuk mengakses controller pada folder admin
   private function getController($controller, $action='', $parameter=''){
      $controllerPath = ROOT .'/application/controllers/admin/'. ucfirst($controller) .'Controller.php';
      if(file_exists($controllerPath)){
         require_once $controllerPath;
         $controllerName = ucfirst($controller)."Controller";      
         $object = new $controllerName();
      
         $act = ($action!='') ? $action : 'index';
         $param = array($parameter);
      
         if(method_exists($controllerName, $act)){
            call_user_func_array(array($object, $act), $param);
         }else die('Action not found!');
      }else die('Controller not found!');
   }
   
   public function index(){
      $this->getController('dashboard');
   }
   
   public function login($action=''){
      $this->getController('login', $action);
   }
	
   public function perusahaan($action='', $parameter=''){
	  $this->getController('perusahaan', $action, $parameter); 
   }
	
   public function merk($action='', $parameter=''){
	   $this->getController('merk', $action, $parameter);
   }
	
   public function karyawan($action='', $parameter=''){
	   $this->getController('karyawan', $action, $parameter);
   }
	
   public function penjualan($action='', $parameter=''){
	   $this->getController('penjualan', $action, $parameter);
   }
	
   public function pinjaman($action='', $parameter=''){
	   //$c=$_SESSION['level'];
	   //if($c=='Super Admin'){
	   //$this->getController('pinjaman', $action, $parameter);
       //}
	   //else
	   //{
	   $this->getController('pinjaman', $action, $parameter);
	   //}
   }

   public function komponen($action='', $parameter=''){
	   $this->getController('komponen', $action, $parameter);
   }
	
   public function laporangaji($action='', $parameter=''){
	   $this->getController('laporangaji', $action, $parameter);
   }
	
   public function laporanabsen($action='', $parameter=''){
	   $this->getController('laporanabsen', $action, $parameter);
   }
	
   public function tidakhadir($action='', $parameter=''){
	   $this->getController('tidakhadir', $action, $parameter);
   }
	
   public function absen($action='', $parameter=''){
	   $this->getController('absen', $action, $parameter);
   }
	
   public function tanggal($action='', $parameter=''){
	   $this->getController('tanggal', $action, $parameter);
   }
	
   public function profil($action=''){
	   $this->getController('profil', $action);
   }
	
   public function user($action='', $parameter=''){
	   $this->getController('user', $action, $parameter);
   }
   
   public function logout(){
      session_destroy();
      $this->redirect('admin/login');
   }
   
}