<?php
class tanggalModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "tanggalmerah";      
   }
}