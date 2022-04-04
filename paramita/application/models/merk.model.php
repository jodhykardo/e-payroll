<?php
class merkModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "merk";      
   }
}