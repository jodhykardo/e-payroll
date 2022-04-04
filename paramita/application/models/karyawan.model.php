<?php
class KaryawanModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "karyawan";      
   }
}