<?php
use \application\controllers\AdminMainController;
class DashboardController extends AdminMainController{
   public function index(){      
     $this->model('penjualan');
  //Mendapatkan jumlah kategori
     $this->model('karyawan');
     $query = $this->karyawan->selectAll();
     $karyawan = $this->karyawan->getRows($query);

//Mendapatkan jumlah produk     
     $this->model('tidakhadir');
     $query = $this->tidakhadir->selectWhere(array('jenis_tidakhadir' => 'Izin'));
     $izin = $this->tidakhadir->getRows($query);

//Mendapatkan jumlah transaksi terbaru  
     $this->model('tidakhadir');
     $query = $this->tidakhadir->selectWhere(array('jenis_tidakhadir'=>'Sakit'));
     $sakit = $this->tidakhadir->getRows($query);

//Mendapatkan jumlah pesan terbaru     
     $this->model('tidakhadir');
     $query = $this->tidakhadir->selectWhere(array('jenis_tidakhadir'=>'Cuti'));
     $cuti = $this->tidakhadir->getRows($query);

//Mendapatkan data untuk ditampilkan pada chart         
      $nama_bulan = array(1=>"Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des");
      
      $arr_bulan = array();
      $arr_data = array();
      
	  //Mendapatkan data bulan dari 11 bulan yang lalu hingga bulan ini
      for($i=11; $i>=0; $i--){
         $bulan = date('n') - $i;
         $tahun = date('Y');
      
         if($bulan < 1){
            $bulan += 12;
            $tahun -= 1;
         }         
         
         $arr_bulan[] = $nama_bulan[(int) $bulan];
         
		 //Mendapatkan data transaksi pada bulan tertentu
         $query = $this->penjualan->selectWhere(array('month(bulan_bonus)'=>$bulan, 'year(bulan_bonus)'=>$tahun));
         $datatrans = $this->penjualan->getResult($query);
         
		 //Mendapatkan jumlah penjualan dari transaksi
         if(isset($datatrans[0])){
            $idtrans = $datatrans[0]['id_penjualan'];
            $query = $this->penjualan->query("SELECT sum(total_penjualan) as total FROM penjualan WHERE id_penjualan='$idtrans'");
            $hasil = $this->penjualan->getResult($query);
            $arr_data[] = $hasil[0]['total'];
         }else{
            $arr_data[] = 0;
         }
         
      }
      
	  //Menggabungkan semua data yang akan dikirim ke view pada variabel $data
     $data = array(
        'karyawan' => $karyawan,
        'izin' => $izin,
        'sakit' => $sakit,
        'cuti' => $cuti,
        'namabulan' => $arr_bulan,
        'data' => $arr_data
     );
     
      $this->template('admin/dashboard', 'Dashboard', $data);
    
   }
}