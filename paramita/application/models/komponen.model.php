<?php
class komponenModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "master_gaji";      
   }
}