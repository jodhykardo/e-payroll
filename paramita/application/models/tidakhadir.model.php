<?php
class TidakhadirModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "tidakhadir";      
   }
}