<?php
class laporangajiModel extends Model{
   public function __construct(){
      $this->connect();
      $this->_table = "laporangaji";      
   }
}