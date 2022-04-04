<?php
class pinjamanModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "pinjaman";      
   }
}