<?php
class TelatModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "telat";      
   }
}