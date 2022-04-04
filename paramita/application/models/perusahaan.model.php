<?php
class perusahaanModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "perusahaan";      
   }
}