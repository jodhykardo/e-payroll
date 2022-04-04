<?php
class AbsenModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "absen";      
   }
}